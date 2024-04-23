<?php

function openPopupWithIframe($url)
{
    echo "<script>";
    echo "function openPopup() {";
    echo "    var popup = window.open('', 'AntecedentesCriminaisPopup', 'width=900,height=600');"; // Abre um pop-up com as dimensões desejadas
    echo "    popup.document.write(\"<iframe src='$url' style='width:100%;height:100%;border:none;'></iframe>\");"; // Insere o iframe no pop-up
    echo "}";
    echo "</script>";

    echo "<button class='btn btn-success stickB' onclick='openPopup()'>Abrir Consulta de Antecedentes Criminais</button>";
}

$url = 'https://servicos.pf.gov.br/epol-sinic-publico/';

