<?php
$renderBtn = (!empty($btnAction) && !empty($btnLabel)) ? "<a href=\"{$btnAction}\" class=\"btn btn-dark\">{$btnLabel}</a>" : '';
$basic = <<<HTML
    <div class="card" style="width: $width">
      <img src="$img" class="card-img-top">
        <div class="card-body">
        <h5 class="card-title">$title</h5>
        <h6 class="card-subtitle mb-2 text-muted">$subTitle</h6>
        <p class="card-text">$text</p>
        $renderBtn
        </div>
    </div>
HTML;

$body = <<<HTML
    <div class="card" style="width: $width">
        <div class="card-body">
        <p class="card-text">$text</p>
        $renderBtn
        </div>
    </div>
HTML;

switch ($type){
    case 'body':
        echo $body;
        break;
    default:
    echo $basic;
    break;
}


?>

