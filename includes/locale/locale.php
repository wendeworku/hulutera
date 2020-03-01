<?php

function locale($current_link)
{
    $ln = 0;
    $en = null;
    $am = null;
    $ao = null;
    $tg = null;
    $so = null;
    $gu = null;
    $si = null;
    $wo = null;
    if (isset($_GET['lan'])) {
        $arr = array("&lan=am", "&lan=en", "&lan=ao", "&lan=tg", "&lan=so", "&lan=gu", "&lan=si", "&lan=wo");
        foreach ($arr as $key => $value) {
            if (strpos($current_link, $value) !== false) {
                $current_link = str_replace($value, '', $current_link);
                break;
            }
        }
        $en = $current_link . '&lan=en';
        $am = $current_link . '&lan=am';
        $ao = $current_link . '&lan=ao';
        $tg = $current_link . '&lan=tg';
        $so = $current_link . '&lan=so';
        $gu = $current_link . '&lan=gu';
        $si = $current_link . '&lan=si';
        $wo = $current_link . '&lan=wo';
    } else {
        $en = $current_link . '?&lan=en';
        $am = $current_link . '?&lan=am';
        $ao = $current_link . '?&lan=ao';
        $tg = $current_link . '?&lan=tg';
        $so = $current_link . '?&lan=so';
        $gu = $current_link . '?&lan=gu';
        $si = $current_link . '?&lan=si';
        $wo = $current_link . '?&lan=wo';
    }

    $language = [
        $ln => "LANGUAGE",
        $en => "ENGLISH",
        $am => "አማርኛ",
        $ao => "AFAN OROMO",
        $tg => "ትግርኛ",
        $so => "SOMALI",
        $si => "SIDAAMU AFOO",
        $gu => "ጉራግኛ",
        $wo => "ወላይትኛ"
    ];
    echo '<div id="toplinktexts">';
    echo '<select onchange="location =this.options[this.selectedIndex].value;" name="language" class="locale">';
    foreach ($language as $key => $value) {
        //use mb_substr($value,0,2) to get the first two characters
        echo '<option value = "' . $key . '">'.$value.'</option>';
    }
    echo '</select>';
    echo '<div>';
}
