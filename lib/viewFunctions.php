<?php
function loadTemplate($name)
{
    if (file_exists("$name.html")) return file_get_contents("$name.html");
    if (file_exists("templates/$name.html")) return file_get_contents("templates/$name.html");
    if (file_exists("../templates/$name.html")) return file_get_contents("../templates/$name.html");
}

function replaceContent($data, $template_html)
{
    $returnval = "";

    foreach ($data as $row) {

        //replace fields with values in template
        $content = $template_html;
        foreach ($row as $field => $value) {
            $content = str_replace("@@$field@@", $value, $content);
        }

        $returnval .= $content;
    }

    return $returnval;
}