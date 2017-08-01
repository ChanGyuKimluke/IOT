<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->config(array(
    'debug' => true,
    'templates.path' => '../templates'
));
$settingValue = $app->config('templates.path'); //returns "../templates"

// Register routes
// separate route files based on content
$routeFiles = (array) glob('routes/*.php');
foreach($routeFiles as $routeFile) {
    require __DIR__ . "/" . $routeFile;
}






//for testing slim
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

//user will be got authentication email 
$app->post('/user-info', function () use ($app) {
    $app->render('user-info-command.phtml');
});

//user will be got token to change password(reset password)
$app->post('/reset-password', function () use ($app) {
    $app->render('re-password-command.phtml');
});

//to fill out token and new password
$app->post('/reset-password-change', function () use ($app) {
    $app->render('re-passwordchange-command.phtml');
});

//user log-in
$app->post('/login', function () use ($app) {
    $app->render('user-login-command.phtml');
});


/* Android will request heart rate information, so let's do an example of selecting
and returning json data
*/

$app->get('/formation', function () use ($app) {
    echo "<form method='post' action='reception?id=mike'>\n";
    echo "<input type='text' name='foo' value='bar'>\n";
    echo "<input type='submit'>\n";
    echo "</form>\n";
    exit;
});

$app->post('/reception', function () use ($app) {
print_r($_POST);
print_r($_GET);
exit;
});

$app->get('/simple', function () use ($app) {
    include "db_functions.php";
    try {
        $sth = $pdo->prepare("SELECT name, lat, lng, insert_date, tth
            FROM pokemon
            ORDER BY insert_date desc
            LIMIT 5");

        $sth->execute();

        $result = $sth->fetchAll();

        if ($result) {
            // slim php style
            $app->response->headers->set('Content-Type', 'application/json');
            return $app->response->write(json_encode($result));

            // regular php style
            /*
            header("Content-type:application/json");
            echo json_encode($result);
            exit;
            */
        }
    } catch (Exception $e) {
        return $app->response->setStatus(400);
    }
}); 

$app->get('/simple/:name', function ($name) use ($app) {
    include "db_functions.php";
    try {
        $sth = $pdo->prepare("SELECT name, lat, lng, insert_date, tth
            FROM pokemon
            WHERE name = :pokemon
            ORDER BY insert_date desc
            LIMIT 5");

        $sth->bindValue(':pokemon', $name, PDO::PARAM_STR);
        $sth->execute();

        $result = $sth->fetchAll();

        if ($result) {
            // slim php style
            $app->response->headers->set('Content-Type', 'application/json');
            return $app->response->write(json_encode($result));

            // regular php style
            /*
            header("Content-type:application/json");
            echo json_encode($result);
            exit;
            */
        }
    } catch (Exception $e) {
        return $app->response->setStatus(400);
    }
}); 

$app->get('/distance/:location/:radius', function ($location, $radius) use ($app) {
    // if radius not integer, return 400 error
    if (!filter_var($radius, FILTER_VALIDATE_INT)) {
        http_response_code(400);
        exit;
    }

    include "db_functions.php";

    switch ($location) {
        case 'ucsd':
            $lat = 32.8801;
            $lng = -117.2340;
            break;
    }

    try {
        $sth = $pdo->prepare("SELECT name, lat, lng,
        (
            6371 *
            acos(
                cos( radians( :lat ) ) *
                cos( radians( `lat` ) ) *
                cos(
                    radians( `lng` ) - radians( :lng )
                ) +
                sin(radians(:lat)) *
                sin(radians(`lat`))
            )
                ) `distance`
            FROM pokemon
            HAVING `distance` < :radius
            ORDER BY `distance`
            LIMIT 725");

        $sth->bindParam(':lat', $lat);
        $sth->bindParam(':lng', $lng);
        $sth->bindParam(':radius', $radius);

        $sth->execute();

        $result = $sth->fetchAll();

        if ($result) {
            $app->response->headers->set('Content-Type', 'application/json');
            return $app->response->write(json_encode($result));

        }
    } catch (Exception $e) {
        return $app->response->setStatus(400, $e->getMessage());
    }
}); 

$app->post('/receive-user-data', function () use ($app) {
    $json = $app->request->getBody();

    var_dump($json);
    exit;

    $json_array = json_decode($json, true);
//var_dump($json_array);

$sth = $pdo->prepare("INSERT INTO aqi_data (temp, no2, pm25) values (:temp, :no2, :pm25)");

foreach ($json_array as $line) {
    $sth->bindValue(':temp', $line['temp'], PDO::PARAM_INT);
    $sth->bindValue(':no2', $line['no2'], PDO::PARAM_INT);
    $sth->bindValue(':pm25', $line['pm25'], PDO::PARAM_INT);

    $sth->execute();
}

    // send back a 200 status for success
    // your code should process the data, insert into database, etc ...
    http_response_code(200);
    $app->response->headers->set('Content-Type', 'application/json');
    return $app->response->write(json_encode(array("status"=>"success")));
}); 

$app->post('/saveupload', function () use ($app) {
    $new_name = str_replace(".csv", "-" . time() . ".csv", $_FILES["file"]['name']);
    move_uploaded_file($_FILES["file"]["tmp_name"], "/tmp/" . $new_name);

    http_response_code(200);
    $app->response->headers->set('Content-Type', 'application/json');
    return $app->response->write(json_encode(array("status"=>"success", "path"=>"/tmp/$new_name")));

});
// This mail test works 
$app->get('/newmailtest', function () use ($app) {

 $id = 'michiu@ucsd.edu';

        $mail = new \PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "overoverthis@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "thisoverover";

        $mail->setFrom('michiu@ucsd.edu', 'Mike Chiu');
        $mail->addAddress($id);
        $mail->addReplyTo('no-reply@example.com', 'Example.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'IOT Project - Account Authentication';
        $mail->Body    = "
            <p>Hi,</p>
            <p>            
            Thank you for registering for my IOT project. Please click the following link:<br />
            <a href='asdfasdfas.com'>LINK</a> to activate the account.
            </p>
            <p>
            Carry on.
            </p>";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
/*
        if(!$mail->send()) {
            $this->flash("error", "We're having trouble with our mail servers at the moment.  Please try again later, or contact us directly by phone.");
            error_log('Mailer Error: ' . $mail->errorMessage());
            $this->halt(500);
        }
*/        
});


$app->run();
