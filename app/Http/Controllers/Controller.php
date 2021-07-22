<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Abraham\TwitterOAuth\TwitterOAuth;


class Controller extends BaseController
{
   // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function gonder(Request $request ){
   
    $kontrol= Validator::make($request->all(),array(
        'posticerik' => 'required|max:140'

    ));

   if($kontrol->fails())
    {

        return redirect()->route('welcome');
    }

    else

    { ////
       
        $isim=$request->input('posticerik');
    }


    $link = 'd';
$access_token = 'AQXsHKINVvWmFm_RYe37gsxHhATdKNZ9PTItoN5-t5JlFBgPmVtNnAxO3TqrnVTl-9Ro9cojcXJDf_S7XDvsR5svWaGUBja_ZWxzeWXKLG1Vx_CwLihq8PA4d9eCkeEx0qUGEhtrYgl9CgsyaVrmZKUHRltsyZKnb-_aH4k83fUNsNqAOMwC1QWIOSDBTfeie31abmmHmfic_PCzbvMS9AasfCES1rTn69VIpiYQNvu9OvaqeB_Moe6qTrkPtsugI2wPGsrRRxZV75KHyuRWbs0rhd3jkspDNAP0jCXiRZs0zeJC1dO_Tf8geoGWu2dZGmNdv5p7LI29VMxgZMh_iVVc5OdTHg';
$linkedin_id = 'Y0w1osd7bh';
$body = new \stdClass();
$body->content = new \stdClass();
//$body->content->contentEntities[0] = new \stdClass();
$body->text = new \stdClass();
//$body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
//$body->content->contentEntities[0]->entityLocation = $link;
//$body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = "";
$body->content->title = '';
$body->owner = 'urn:li:person:'.$linkedin_id;
$body->text->text = $isim;
$body_json = json_encode($body, true);
  
try {
    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
    $response = $client->request('POST', '/v2/shares', [
        'headers' => [
            "Authorization" => "Bearer " . $access_token,
            "Content-Type"  => "application/json",
            "x-li-format"   => "json"
        ],
        'body' => $body_json,
    ]);
  
    if ($response->getStatusCode() !== 201) {
        echo 'Error: '. $response->getLastBody()->errors[0]->message;
    }
  
    echo 'linkedin post gönderildi';
} catch(Exception $e) {
    echo $e->getMessage(). ' for link '. $link;
}



////////////
$consumer_key = 'ax3hPFTr806JorlK1Hlut2NYq';
    $consumer_secret = '3pvM7fCTSxOtOtEJajy3LNmQNxr8jYx5hQTTdJcQR5JkNQQzF7';
    $access_token = '1168070477966958592-0LHLoOFKEx1DRb7yoIdTsffIb54dv1';
    $access_token_secret = 'aH2Jp3v0g6lgMjpcfgco3fJwyaGrOgQZJl1RObU0cs1QP';

    /* init API */
    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $str = $isim;
    $arrayCfg['status'] = $str;
    $statuses = $connection->post("statuses/update", $arrayCfg);
    echo 'tweeter post gönderildi';

///////////////
}


  }
  

