<?php
$renderControls = ($controls) ? "
<a class=\"carousel-control-prev\" href=\"#carouselExampleCaptions\" role=\"button\" data-slide=\"prev\">
<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
<span class=\"sr-only\">Previous</span>
</a>
<a class=\"carousel-control-next\" href=\"#carouselExampleCaptions\" role=\"button\" data-slide=\"next\">
<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
<span class=\"sr-only\">Next</span>
</a>
" : '';

$renderFade = ($fade) ? 'carousel-fade' : '';

foreach($data as $key => $slide){
  $active = $key == 0 ? 'active' : '';
  $img = $slide['img'];
  $titulo = $slide['titulo'];
  $texto = $slide['texto'];
  $slides .= "
  <div class=\"carousel-item {$active}\" >
    <img style=\"height: 200px;\" src=\"{$img}\" class=\"d-block w-100\">
    <div class=\"carousel-caption d-none d-md-block\">
      <h5>{$titulo}</h5>
      <p>{$texto}</p>
   </div>
  </div>
  ";

  if($indicators){
    $renderIndicators .= "<li data-target=\"#carouselExampleCaptions\" data-slide-to=\"{$key}\" class=\"{$active}\"></li>";
  }
}


$carousel = <<<HTML
<div id="carouselExampleCaptions" class="carousel slide $renderFade" data-ride="carousel">
  <ol class="carousel-indicators">
      $renderIndicators
  </ol>
  <div class="carousel-inner">
    $slides
  </div>
  $renderControls
</div>
HTML;

echo $carousel;

