<?php
// Routespics

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


class Order extends Illuminate\Database\Eloquent\Model {

    protected $fillable = ['title'];
    public $timestamps = false;
}

class Pic extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

class Twin extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

$app->get('/json/test', function ($request, $response, $args) {

    $order = Order::first();
    $order->title = "Titulo de la orden";
    $order->save();


    $data = array('name' => 'Rob', 'age' => 40);

    return $response->withJson($data);

});

$app->get('/prueba/pic',function($request, $response, $args){
   $pic = Pic::first();
   $pic->id="1";
   $pic->deviceid = "54321";
   $pic->fecha=date("dmy");
   $pic->url = "http://192.168.1.101:8080/img/1.jpg";
   $pic->latitude="100.125.2354";
   $pic->longitude="12.15.234";
   $pic->positive=0;
   $pic->negative=0;
   $pic->warning=0;
   $pic->save();

   //$pic1 = Pic::table('pics')->where('id',1)->first();
   //$pic1=Pic::find("1")->id;
   $data = array(
       'id' => $pic->id,
       'deviceId' => $pic->deviceid,
       'date'=> $pic->fecha,
       'url' => $pic->url,
       'latitude'=> $pic->latitude,
       'longitude'=> $pic->longitude,
       'positive'=> $pic->positive,
       'negative'=> $pic->negative,
       'warning'=> $pic->warning);

   $twin = new Twin();
   $twin->id="1";
   return $response->withJson($data);


});



