<?php

function inputElement($icon, $placeholder, $name, $value)
{
    $ele =
        "<div class='py-2'>
    <div class='input-group flex-nowrap'>
        <span style='background-color:#c7a995' class='input-group-text text-light' id='addon-wrapping'>$icon</span>
        <input type='text' name='$name' value='$value' autocomplete='off' class='form-control' placeholder='$placeholder' aria-label='Username' aria-describedby='addon-wrapping'>
    </div>";

    echo $ele;
}

function buttonElement($btnId, $styleClass, $text, $name, $attr ){
    $btn = "
    <button style='background-color:#8f8f82' name='$name''$attr' class='$styleClass' id='$btnId'>$text</button>
    ";
    echo $btn;
}
