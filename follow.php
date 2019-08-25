<?php
function nabila()
{
    $domain[0]  = "getnada.com";
    $domain[1]  = "abyssmail.com";
    $domain[2]  = "boximail.com";
    $domain[3]  = "clrmail.com";
    $domain[4]  = "dropjar.com";
    $domain[5]  =  "getairmail.com";
    $domain[6]  = "givmail.com";
    $domain[7]  = "inboxbear.com";
    $domain[8]  = "robot-mail.com";
    $domain[9]  = "tafmail.com";
    $domain[10] = "vomoto.com";
    $domain[11] = "zetmail.com";
    $domain[12] = "gmail.com";
    $domain[13] = "yahoo.com";
    $domain[14] = "yandex.com";

    $email    = $domain[rand(0, 14)];
    $get      = file_get_contents("https://api.randomuser.me");
    $j        = json_decode($get, true);
    $getName  = $j["results"][0]["name"]["first"];
    $getName2 = $j["results"][0]["name"]["last"];
    $photo    = $j["results"][0]["picture"]["large"];
    $huruf    = "0123456789abcdefghijklmnopqrstuvwxyz";
    $id       = "";

    for ($i = 0; $i < 10; $i++) {
        $id .= $huruf[mt_rand(0,strlen($huruf) - 1)];
    }

    $rand = rand(0, 9999);
    $body = '{"deviceId":"6cb90'.$id.
            '76","deviceType":"android","email":"'.$getName2.
            "".$rand.
            "@".$email.
            '","inviteCode":"'.$reff.
            '","name":"'.$getName.
            " ".$getName2.
            '","password":"'.$getName.
            "".$rand.
            '","profilePic":"XxqkwGJWIaRUJMXWUngFrLApccRoCpLZ.jpeg","username":"'.$getName2.
            "".$rand.
            '"}';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://restdb.oevo.com/post-register");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "oevo_token: 3LVZb1OHJx6D9rbE3VhS2NrMzfhfRLs4YZXICly14WP";
    $headers[] = "Content-Type: application/json";
    $headers[] = "User-Agent: okhttp/3.9.1";
    $result    = curl_exec($ch);
    return $result;
}

function bngst($a, $reff)
{
    $asw   = json_decode(nabila());
    $bngst = $asw->sessionToken;
    $body  = '{"isFollowed":"no","profileuser":"'.$reff.
             '","sessionToken":"'.$bngst.
             '","username":"'.$ambil.
             '"}';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://restdb.oevo.com/post-subscribe");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "oevo_token: 3LVZb1OHJx6D9rbE3VhS2NrMzfhfRLs4YZXICly14WP";
    $headers[] = "Content-Type: application/json";
    $headers[] = "User-Agent: okhttp/3.9.1";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

print "Oevo - Vine App, Create, Share, & Win!\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";

echo "Reff Kamu : ";
$reff = trim(fgets(STDIN));

for ($a = 1; $a < 100; $a++) {
    $oce = bngst($a, $reff);
    echo "".$oce."\n";
}
?>
