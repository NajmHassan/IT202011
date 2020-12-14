
<?php
$id = 0;
$src = 0;
if(isset($_GET["id"])){
$id = $_GET["id"];
}


if ($id == 1){ //sephora gift set
  $src = "https://www.sephora.com/productimages/product/p460786-av-02-zoom.jpg";
}
if ($id == 2){ //Bear Cup
  $src = "https://i.imgur.com/NbSPchd.jpg";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 3){ //Self tanner
$src = "https://images-na.ssl-images-amazon.com/images/I/413Iq1%2BOAaL._AC_UL474_SR474,450_.jpg";
}
if ($id == 4){ // mini Sqish
$src = "https://i.ebayimg.com/images/g/NWYAAOSwGAxfwvAH/s-l640.jpg";
echo " YOU OPENED THIS BEFORE";
}
if ($id == 5){ // setting spray
$src = "https://imgix.bustle.com/uploads/image/2020/6/26/73cb9eb1-df6a-4aee-bb4a-381f1913cdd3-105955420_115667920190306_7856694713634091267_n.jpg?w=1080&h=600&fit=crop&crop=faces&auto=format%2Ccompress&cs=srgb&q=70";
echo " YOU OPENED THIS BEFORE";
}
if ($id == 6){// candle
$src = "https://www.bathandbodyworks.com/dw/image/v2/BBDL_PRD/on/demandware.static/-/Sites-master-catalog/default/dwf925ec0d/hires/026154798.jpg?sh=1500&sfrm=jpg";
}
if ($id == 7){ // pallet
$src = "https://images.ulta.com/is/image/Ulta/2561408_prod_altimg_2?$tn$";
echo " YOU OPENED THIS BEFORE";
}
if ($id == 8){// candle
$src = "https://www.bathandbodyworks.com/dw/image/v2/BBDL_PRD/on/demandware.static/-/Sites-master-catalog/default/dw682b17e8/hires/026154793.jpg?sh=1500&sfrm=jpg";
echo " YOU OPENED THIS BEFORE";
}
if ($id == 9){ // succulant
$src = "https://cdn.shopify.com/s/files/1/2198/4603/products/Echeveriasubsessilis2_980x.jpg?v=1590482499";
echo "Name a plant, and i will get it for you!";
}
if ($id == 10){ // candle
$src = "https://www.bathandbodyworks.com/dw/image/v2/BBDL_PRD/on/demandware.static/-/Sites-master-catalog/default/dwfa8feac7/hires/026180777.jpg?sh=1500&sfrm=jpg";
}
if ($id == 11){
$src = "https://business.time.com/wp-content/uploads/sites/2/2012/08/107428671-e13446287357841.jpg?w=720&h=480&crop=1";
echo "$50 SHOPPING SPREE!!!";
echo "YOU GOT THIS ALREADY";
}

if ($id == 12){// candle
$src = "https://www.bathandbodyworks.com/dw/image/v2/BBDL_PRD/on/demandware.static/-/Sites-master-catalog/default/dw44fa8754/hires/024362003.jpg?sh=471";
echo " YOU OPENED THIS BEFORE";
}

if ($id == 13){
  $src = "https://pbs.twimg.com/profile_images/1323301738061942785/iIpxjmVm_400x400.jpg";
  echo "YOU GOT THIS ALREADY CHICK FIL A";


}
if ($id == 14){
  $src = "https://www.bathandbodyworks.com/dw/image/v2/BBDL_PRD/on/demandware.static/-/Sites-master-catalog/default/dw8a371b50/hires/026145853.jpg?sh=471";
  echo "YOU GOT THIS ALREADY";
}
if ($id == 15){
  $src = "https://cdn.shopify.com/s/files/1/2198/4603/products/Echeveriasubsessilis2_980x.jpg?v=1590482499";
  echo "Name a plant, and i will get it for you!";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 16){ // scent thingie
  $src = "https://media1.popsugar-assets.com/files/thumbor/XTPw-WnHr3Q7ncFYEOH2Uvqqj4w/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2020/11/04/993/n/1922794/a534723e047a94e2_netimgpkVk2c/i/White-Eucalyptus-Sage-Three-Wick-Candle.jpg";
}

if ($id == 17){
  $src = "https://media1.popsugar-assets.com/files/thumbor/XTPw-WnHr3Q7ncFYEOH2Uvqqj4w/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2020/11/04/993/n/1922794/a534723e047a94e2_netimgpkVk2c/i/White-Eucalyptus-Sage-Three-Wick-Candle.jpg";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 18){
  $src = "https://i.pinimg.com/originals/5f/b4/03/5fb4031f90d9feb4b21c6a8a8efda01c.png";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 19){// candle
  $src = "https://www.justonecookbook.com/wp-content/uploads/2020/06/Dragon-Roll-0286-I-500x375.jpg";
  echo "Arigato Date";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 20){ //projector
  $src = "https://media.phillyvoice.com/media/images/11-18-five-below-price-increases.2e16d0ba.fill-735x490.jpg";
  echo "Five Below Run. $40 is good enough?";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 21){
  $src = "https://images-na.ssl-images-amazon.com/images/I/6119BXuMB5L._SX679_.jpg";
}
if ($id == 22){
  $src = "https://images-na.ssl-images-amazon.com/images/I/51HoSgPaKmL._AC_UY879_.jpg";
}
if ($id == 23){
  $src = "https://ci5.googleusercontent.com/proxy/g3H_RAI7vvvmjL44QnxzFJKj-gp6bJRzvOXXJJCihjzM9gyAROxdRYYCY1RaWEXXWKsf_oqHxXJv6ohBcR51OE-zn4fqe3AdWOu-eCheDww2x7UWSncOGqpxTh_hoDdsqDQMc5XUyd9d9135K7KJgWRbG9j5C_-Cen_LyORIXVH98Ipe=s0-d-e1-ft#http://img.ltwebstatic.com/images3_pi/2020/11/04/1604452849818e44ed19d1a8506f67d26bd48bbc46_thumbnail_220x293.jpg";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 24){
  $src = "https://ci6.googleusercontent.com/proxy/l9z5Ad2Wue8c7ieVmU_YJgIM7FpYkzxN0FXGymYZSUDPZO_5QTwNA3xlB3D-OqTSuicJG6cYw0C_OoNDbqmecfIQpr6CCLIxxFFR64ei0h2SoZErGNXrvcW9vH_kAkNAYf_He4vyxNUNVLPlDzvCb2rQqk_A2nQf5YkbOv2jh5ZFGTl_=s0-d-e1-ft#http://img.ltwebstatic.com/images3_pi/2020/11/17/1605581298a6fe6086f1f225661fd3458f32d7ecf2_thumbnail_220x293.jpg";
  echo " YOU OPENED THIS BEFORE";
}
if ($id == 25){
  $src = "";
}
if ($id == 26){
  $src = "nothin here, i love you though :)";
}
 ?>
 <img src="<?php echo $src;?>" alt="pick another gift dickhead">
