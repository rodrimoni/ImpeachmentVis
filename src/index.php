
<?php
  $db = new PDO("sqlite:deps.db");
  $parties = array();
  $states = array();
  $allText = "";

  $queryParty = "SELECT DISTINCT Partido FROM impeatchment order by Partido";
    foreach ($db->query($queryParty) as $row){
      $parties[] = $row['Partido'];
    }

  $queryState = "SELECT DISTINCT Estado FROM impeatchment order by Estado";
    foreach ($db->query($queryState) as $row){
      $states[] = $row['Estado'];
    }

  $queryPhrases = "SELECT Fala FROM impeatchment";

  foreach($db->query($queryPhrases) as $row)
  {
    $trash = array(",", "!", ".", ":", ";", "?");
    $talk = str_replace($trash, "", utf8_decode($row['Fala']));
    $words = explode(" ", $talk);
    foreach ($words as $w)
    {
      if (strlen($w) > 2)
      {
        $w = strtolower($w);
        if( isset($allText[$w]))
        {
          $allText[$w] += 1;
        }
        else
          $allText[$w] = 1;
      }
    }
  }


  foreach($allText as $key => $a)
  {
    if ($a < 15)
      unset($allText[$key]);
  }

  unset($allText['que']);
  unset($allText['com']);
  unset($allText['uma']);
  unset($allText['por']);
  unset($allText['dos']);
  unset($allText['das']);
  unset($allText['nas']);
  unset($allText['nos']);
  unset($allText['sem']);
  unset($allText['nem']);
  unset($allText['sua']);
  unset($allText['pela']);
  unset($allText['pelo']);
  unset($allText['srs']);
  unset($allText['sou']);
  unset($allText['minha']);
  unset($allText['ela']);
  unset($allText['isso']);
  unset($allText['ter']);
  unset($allText['tem']);
  unset($allText['sras']);
  unset($allText['são']);
  unset($allText['meus']);
  unset($allText['todos']);
  unset($allText['para']);
  unset($allText['esse']);
  unset($allText['meu']);
  unset($allText['minhas']);
  unset($allText['ele']);
  unset($allText['seu']);
  unset($allText['nós']);
  unset($allText['mas']);
  unset($allText['são']);
  unset($allText['este']);
  unset($allText['esta']);

  $finalText = "";
  foreach ($allText as $key => $value) {
    $finalText .= str_repeat($key . " ", $value);
  }

  //$finalText = utf8_encode($finalText);

  //$finalText = explode(" ", $finalText);
  //var_dump($finalText);

  //exit;

  $svgStaticCreated = "<svg width='960' height='600' version='1.1' xmlns='http://www.w3.org/2000/svg'><g></g><g id = 'cloudWords' transform='translate(480,300)'><text text-anchor='middle' transform='translate(57,-107)rotate(59.99999999999999)' style='font-size: 100px; font-family: Impact; fill: rgb(181, 207, 107);'>voto</text><text text-anchor='middle' transform='translate(175,28)rotate(-59.999999999999986)' style='font-size: 97px; font-family: Impact; fill: rgb(206, 219, 156);'>presidente</text><text text-anchor='middle' transform='translate(-206,-81)rotate(29.999999999999996)' style='font-size: 94px; font-family: Impact; fill: rgb(231, 203, 148);'>meu</text><text text-anchor='middle' transform='translate(202,-176)rotate(-59.99999999999999)' style='font-size: 93px; font-family: Impact; fill: rgb(214, 97, 107);'>não</text><text text-anchor='middle' transform='translate(265,51)rotate(0)' style='font-size: 92px; font-family: Impact; fill: rgb(173, 73, 74);'>sim</text><text text-anchor='middle' transform='translate(13,46)rotate(-29.999999999999993)' style='font-size: 86px; font-family: Impact; fill: rgb(206, 109, 189);'>minha</text><text text-anchor='middle' transform='translate(-71,-24)rotate(-59.99999999999999)' style='font-size: 86px; font-family: Impact; fill: rgb(82, 84, 163);'>brasil</text><text text-anchor='middle' transform='translate(-56,-138)rotate(29.999999999999996)' style='font-size: 80px; font-family: Impact; fill: rgb(57, 59, 121);'>para</text><text text-anchor='middle' transform='translate(2,124)rotate(-29.999999999999996)' style='font-size: 80px; font-family: Impact; fill: rgb(222, 158, 214);'>povo</text><text text-anchor='middle' transform='translate(-215,-176)rotate(0)' style='font-size: 69px; font-family: Impact; fill: rgb(99, 121, 57);'>estado</text><text text-anchor='middle' transform='translate(-199,53)rotate(-59.99999999999999)' style='font-size: 68px; font-family: Impact; fill: rgb(181, 207, 107);'>contra</text><text text-anchor='middle' transform='translate(43,-213)rotate(-29.999999999999996)' style='font-size: 67px; font-family: Impact; fill: rgb(206, 219, 156);'>país</text><text text-anchor='middle' transform='translate(-155,137)rotate(-29.999999999999996)' style='font-size: 65px; font-family: Impact; fill: rgb(222, 158, 214);'>nome</text><text text-anchor='middle' transform='translate(-261,-7)rotate(-29.999999999999993)' style='font-size: 63px; font-family: Impact; fill: rgb(231, 203, 148);'>pelos</text><text text-anchor='middle' transform='translate(209,102)rotate(0)' style='font-size: 62px; font-family: Impact; fill: rgb(132, 60, 57);'>aqui</text><text text-anchor='middle' transform='translate(-200,216)rotate(0)' style='font-size: 60px; font-family: Impact; fill: rgb(57, 59, 121);'>família</text><text text-anchor='middle' transform='translate(-332,130)rotate(29.999999999999996)' style='font-size: 58px; font-family: Impact; fill: rgb(99, 121, 57);'>meus</text><text text-anchor='middle' transform='translate(299,-84)rotate(-59.99999999999999)' style='font-size: 58px; font-family: Impact; fill: rgb(140, 162, 82);'>dilma</text><text text-anchor='middle' transform='translate(-120,165)rotate(59.99999999999999)' style='font-size: 52px; font-family: Impact; fill: rgb(173, 73, 74);'>nós</text><text text-anchor='middle' transform='translate(-47,217)rotate(59.99999999999999)' style='font-size: 50px; font-family: Impact; fill: rgb(156, 158, 222);'>este</text><text text-anchor='middle' transform='translate(345,-90)rotate(-59.999999999999986)' style='font-size: 48px; font-family: Impact; fill: rgb(231, 150, 156);'>aos</text><text text-anchor='middle' transform='translate(-391,151)rotate(29.999999999999996)' style='font-size: 46px; font-family: Impact; fill: rgb(99, 121, 57);'>são</text><text text-anchor='middle' transform='translate(-339,-107)rotate(-59.99999999999999)' style='font-size: 46px; font-family: Impact; fill: rgb(173, 73, 74);'>está</text><text text-anchor='middle' transform='translate(164,150)rotate(-29.999999999999996)' style='font-size: 45px; font-family: Impact; fill: rgb(123, 65, 115);'>mas</text><text text-anchor='middle' transform='translate(133,-236)rotate(-29.999999999999993)' style='font-size: 41px; font-family: Impact; fill: rgb(165, 81, 148);'>srs</text><text text-anchor='middle' transform='translate(-177,79)rotate(-59.99999999999999)' style='font-size: 37px; font-family: Impact; fill: rgb(222, 158, 214);'>tem</text><text text-anchor='middle' transform='translate(-270,45)rotate(-29.999999999999996)' style='font-size: 35px; font-family: Impact; fill: rgb(82, 84, 163);'>rio</text><text text-anchor='middle' transform='translate(-286,-127)rotate(-59.99999999999999)' style='font-size: 33px; font-family: Impact; fill: rgb(82, 84, 163);'>vida</text><text text-anchor='middle' transform='translate(2,162)rotate(0)' style='font-size: 31px; font-family: Impact; fill: rgb(156, 158, 222);'>vai</text><text text-anchor='middle' transform='translate(-227,-230)' style='font-size: 29px; font-family: Impact; fill: rgb(189, 158, 57);'>fora</text><text text-anchor='middle' transform='translate(-43,-3)' style='font-size: 25px; font-family: Impact; fill: rgb(231, 203, 148);'>fazer</text><text text-anchor='middle' transform='translate(75,53)rotate(-29.999999999999996)' style='font-size: 24px; font-family: Impact; fill: rgb(173, 73, 74);'>ter</text><text text-anchor='middle' transform='translate(-13,-33)rotate(29.999999999999996)' style='font-size: 19px; font-family: Impact; fill: rgb(132, 60, 57);'>ela</text><text text-anchor='middle' transform='translate(-241,3)rotate(-59.99999999999999)' style='font-size: 19px; font-family: Impact; fill: rgb(132, 60, 57);'>fim</text><text text-anchor='middle' transform='translate(-145,69)rotate(-59.99999999999999)' style='font-size: 19px; font-family: Impact; fill: rgb(231, 203, 148);'>pai</text><text text-anchor='middle' transform='translate(-219,-12)rotate(-59.99999999999999)' style='font-size: 11px; font-family: Impact; fill: rgb(173, 73, 74);'>essa</text><text text-anchor='middle' transform='translate(-107,-131)rotate(-29.999999999999996)' style='font-size: 10px; font-family: Impact; fill: rgb(123, 65, 115);'>tão</text><text text-anchor='middle' transform='translate(145,100)rotate(-59.99999999999999)' style='font-size: 10px; font-family: Impact; fill: rgb(206, 109, 189);'>ele</text><text text-anchor='middle' transform='translate(-149,-137)' style='font-size: 33px; font-family: Impact; fill: rgb(156, 158, 222);'>favor</text><text text-anchor='middle' transform='translate(244,186)rotate(-30)' style='font-size: 59px; font-family: Impact; fill: rgb(82, 84, 163);'>respeito</text><text text-anchor='middle' transform='translate(-346,66)rotate(30)' style='font-size: 56px; font-family: Impact; fill: rgb(181, 207, 107);'>nosso</text><text text-anchor='middle' transform='translate(-379,-22)rotate(0)' style='font-size: 56px; font-family: Impact; fill: rgb(206, 219, 156);'>golpe</text><text text-anchor='middle' transform='translate(343,9)rotate(60)' style='font-size: 54px; font-family: Impact; fill: rgb(140, 109, 49);'>todos</text><text text-anchor='middle' transform='translate(-336,205)rotate(-60)' style='font-size: 49px; font-family: Impact; fill: rgb(189, 158, 57);'>quero</text><text text-anchor='middle' transform='translate(17,-53)rotate(0)' style='font-size: 49px; font-family: Impact; fill: rgb(231, 186, 82);'>mais</text><text text-anchor='middle' transform='translate(-329,-210)rotate(-30)' style='font-size: 48px; font-family: Impact; fill: rgb(231, 203, 148);'>deputados</text><text text-anchor='middle' transform='translate(-298,-63)rotate(0)' style='font-size: 47px; font-family: Impact; fill: rgb(132, 60, 57);'>casa</text><text text-anchor='middle' transform='translate(245,-230)rotate(60)' style='font-size: 46px; font-family: Impact; fill: rgb(140, 162, 82);'>hoje</text><text text-anchor='middle' transform='translate(346,174)rotate(-30)' style='font-size: 46px; font-family: Impact; fill: rgb(181, 207, 107);'>corrupção</text><text text-anchor='middle' transform='translate(-105,-239)rotate(30)' style='font-size: 45px; font-family: Impact; fill: rgb(99, 121, 57);'>defesa</text><text text-anchor='middle' transform='translate(350,97)rotate(0)' style='font-size: 45px; font-family: Impact; fill: rgb(156, 158, 222);'>partido</text><text text-anchor='middle' transform='translate(-382,-114)rotate(-60)' style='font-size: 43px; font-family: Impact; fill: rgb(206, 219, 156);'>isso</text><text text-anchor='middle' transform='translate(396,-63)rotate(30)' style='font-size: 43px; font-family: Impact; fill: rgb(140, 109, 49);'>como</text><text text-anchor='middle' transform='translate(310,-193)rotate(60)' style='font-size: 43px; font-family: Impact; fill: rgb(189, 158, 57);'>deus</text><text text-anchor='middle' transform='translate(396,4)rotate(60)' style='font-size: 42px; font-family: Impact; fill: rgb(107, 110, 207);'>cidade</text><text text-anchor='middle' transform='translate(71,252)rotate(0)' style='font-size: 40px; font-family: Impact; fill: rgb(214, 97, 107);'>governo</text><text text-anchor='middle' transform='translate(-29,-260)rotate(0)' style='font-size: 40px; font-family: Impact; fill: rgb(140, 162, 82);'>neste</text><text text-anchor='middle' transform='translate(378,-144)rotate(60)' style='font-size: 39px; font-family: Impact; fill: rgb(231, 150, 156);'>filhos</text><text text-anchor='middle' transform='translate(368,224)rotate(-60)' style='font-size: 39px; font-family: Impact; fill: rgb(206, 219, 156);'>estão</text><text text-anchor='middle' transform='translate(-274,251)rotate(0)' style='font-size: 39px; font-family: Impact; fill: rgb(181, 207, 107);'>crime</text><text text-anchor='middle' transform='translate(-398,86)rotate(-60)' style='font-size: 38px; font-family: Impact; fill: rgb(165, 81, 148);'>dizer</text><text text-anchor='middle' transform='translate(331,-243)rotate(30)' style='font-size: 38px; font-family: Impact; fill: rgb(132, 60, 57);'>querida</text><text text-anchor='middle' transform='translate(399,-233)rotate(60)' style='font-size: 38px; font-family: Impact; fill: rgb(123, 65, 115);'>futuro</text><text text-anchor='middle' transform='translate(-85,234)rotate(60)' style='font-size: 38px; font-family: Impact; fill: rgb(140, 109, 49);'>ruas</text><text text-anchor='middle' transform='translate(-413,186)rotate(60)' style='font-size: 37px; font-family: Impact; fill: rgb(206, 109, 189);'>sras</text><text text-anchor='middle' transform='translate(92,-197)rotate(60)' style='font-size: 36px; font-family: Impact; fill: rgb(222, 158, 214);'>esta</text><text text-anchor='middle' transform='translate(-153,266)rotate(0)' style='font-size: 35px; font-family: Impact; fill: rgb(173, 73, 74);'>deputado</text><text text-anchor='middle' transform='translate(237,242)rotate(30)' style='font-size: 35px; font-family: Impact; fill: rgb(57, 59, 121);'>sou</text><text text-anchor='middle' transform='translate(-386,-230)rotate(-30)' style='font-size: 34px; font-family: Impact; fill: rgb(189, 158, 57);'>porque</text><text text-anchor='middle' transform='translate(-200,-252)rotate(30)' style='font-size: 34px; font-family: Impact; fill: rgb(57, 59, 121);'>minas</text><text text-anchor='middle' transform='translate(-415,-273)rotate(0)' style='font-size: 33px; font-family: Impact; fill: rgb(214, 97, 107);'>grande</text><text text-anchor='middle' transform='translate(144,-274)rotate(0)' style='font-size: 33px; font-family: Impact; fill: rgb(231, 203, 148);'>nossa</text><text text-anchor='middle' transform='translate(183,267)rotate(0)' style='font-size: 31px; font-family: Impact; fill: rgb(181, 207, 107);'>votar</text><text text-anchor='middle' transform='translate(221,145)rotate(-30)' style='font-size: 31px; font-family: Impact; fill: rgb(206, 219, 156);'>ser</text><text text-anchor='middle' transform='translate(140,195)rotate(-30)' style='font-size: 29px; font-family: Impact; fill: rgb(99, 121, 57);'>muito</text><text text-anchor='middle' transform='translate(432,-133)rotate(60)' style='font-size: 27px; font-family: Impact; fill: rgb(231, 186, 82);'>temer</text><text text-anchor='middle' transform='translate(422,180)rotate(60)' style='font-size: 27px; font-family: Impact; fill: rgb(231, 186, 82);'>anos</text><text text-anchor='middle' transform='translate(334,122)rotate(60)' style='font-size: 25px; font-family: Impact; fill: rgb(181, 207, 107);'>foi</text><text text-anchor='middle' transform='translate(292,-31)rotate(60)' style='font-size: 25px; font-family: Impact; fill: rgb(132, 60, 57);'>vou</text><text text-anchor='middle' transform='translate(-326,-156)rotate(30)' style='font-size: 23px; font-family: Impact; fill: rgb(231, 203, 148);'>luta</text><text text-anchor='middle' transform='translate(-408,10)rotate(-60)' style='font-size: 22px; font-family: Impact; fill: rgb(214, 97, 107);'>bahia</text><text text-anchor='middle' transform='translate(-9,193)rotate(60)' style='font-size: 22px; font-family: Impact; fill: rgb(206, 219, 156);'>seu</text><text text-anchor='middle' transform='translate(331,215)rotate(-60)' style='font-size: 21px; font-family: Impact; fill: rgb(140, 109, 49);'>toda</text><text text-anchor='middle' transform='translate(262,276)rotate(0)' style='font-size: 21px; font-family: Impact; fill: rgb(231, 150, 156);'>primeiro</text><text text-anchor='middle' transform='translate(232,-275)rotate(-30)' style='font-size: 20px; font-family: Impact; fill: rgb(206, 109, 189);'>tenho</text><text text-anchor='middle' transform='translate(-305,196)rotate(-60)' style='font-size: 20px; font-family: Impact; fill: rgb(165, 81, 148);'>história</text><text text-anchor='middle' transform='translate(-429,223)rotate(30)' style='font-size: 20px; font-family: Impact; fill: rgb(123, 65, 115);'>maioria</text><text text-anchor='middle' transform='translate(405,257)rotate(-60)' style='font-size: 19px; font-family: Impact; fill: rgb(222, 158, 214);'>janeiro</text><text text-anchor='middle' transform='translate(-127,-225)rotate(30)' style='font-size: 19px; font-family: Impact; fill: rgb(123, 65, 115);'>região</text><text text-anchor='middle' transform='translate(-431,-115)rotate(-60)' style='font-size: 19px; font-family: Impact; fill: rgb(82, 84, 163);'>mulher</text><text text-anchor='middle' transform='translate(-418,252)rotate(30)' style='font-size: 19px; font-family: Impact; fill: rgb(57, 59, 121);'>cometeu</text><text text-anchor='middle' transform='translate(-440,-67)rotate(-60)' style='font-size: 18px; font-family: Impact; fill: rgb(107, 110, 207);'>votos</text><text text-anchor='middle' transform='translate(-135,-120)rotate(0)' style='font-size: 18px; font-family: Impact; fill: rgb(156, 158, 222);'>digo</text><text text-anchor='middle' transform='translate(-45,-39)rotate(60)' style='font-size: 18px; font-family: Impact; fill: rgb(173, 73, 74);'>dia</text><text text-anchor='middle' transform='translate(35,-101)rotate(30)' style='font-size: 17px; font-family: Impact; fill: rgb(140, 109, 49);'>mim</text><text text-anchor='middle' transform='translate(281,236)rotate(60)' style='font-size: 17px; font-family: Impact; fill: rgb(140, 162, 82);'>filho</text><text text-anchor='middle' transform='translate(-171,230)rotate(0)' style='font-size: 17px; font-family: Impact; fill: rgb(206, 219, 156);'>estamos</text><text text-anchor='middle' transform='translate(-7,272)rotate(60)' style='font-size: 17px; font-family: Impact; fill: rgb(181, 207, 107);'>todo</text><text text-anchor='middle' transform='translate(-187,-58)rotate(0)' style='font-size: 15px; font-family: Impact; fill: rgb(231, 186, 82);'>bem</text><text text-anchor='middle' transform='translate(301,63)rotate(0)' style='font-size: 15px; font-family: Impact; fill: rgb(132, 60, 57);'>querem</text><text text-anchor='middle' transform='translate(436,-88)rotate(0)' style='font-size: 15px; font-family: Impact; fill: rgb(189, 158, 57);'>direito</text><text text-anchor='middle' transform='translate(443,77)rotate(-60)' style='font-size: 15px; font-family: Impact; fill: rgb(222, 158, 214);'>paraná</text><text text-anchor='middle' transform='translate(23,129)rotate(-30)' style='font-size: 15px; font-family: Impact; fill: rgb(214, 97, 107);'>vamos</text><text text-anchor='middle' transform='translate(-311,-281)rotate(0)' style='font-size: 15px; font-family: Impact; fill: rgb(231, 203, 148);'>aqueles</text><text text-anchor='middle' transform='translate(28,219)rotate(0)' style='font-size: 14px; font-family: Impact; fill: rgb(123, 65, 115);'>quem</text><text text-anchor='middle' transform='translate(428,248)rotate(-60)' style='font-size: 14px; font-family: Impact; fill: rgb(140, 109, 49);'>pernambuco</text><text text-anchor='middle' transform='translate(-114,-106)rotate(0)' style='font-size: 14px; font-family: Impact; fill: rgb(231, 150, 156);'>sul</text><text text-anchor='middle' transform='translate(-439,52)rotate(60)' style='font-size: 14px; font-family: Impact; fill: rgb(231, 150, 156);'>esposa</text><text text-anchor='middle' transform='translate(-155,155)rotate(-30)' style='font-size: 14px; font-family: Impact; fill: rgb(214, 97, 107);'>estou</text><text text-anchor='middle' transform='translate(355,-135)rotate(30)' style='font-size: 14px; font-family: Impact; fill: rgb(165, 81, 148);'>pessoas</text><text text-anchor='middle' transform='translate(61,270)rotate(0)' style='font-size: 14px; font-family: Impact; fill: rgb(173, 73, 74);'>parlamentares</text><text text-anchor='middle' transform='translate(-74,18)rotate(-60)' style='font-size: 13px; font-family: Impact; fill: rgb(140, 162, 82);'>desta</text><text text-anchor='middle' transform='translate(179,50)rotate(60)' style='font-size: 13px; font-family: Impact; fill: rgb(156, 158, 222);'>pará</text><text text-anchor='middle' transform='translate(147,-98)rotate(30)' style='font-size: 13px; font-family: Impact; fill: rgb(99, 121, 57);'>netos</text><text text-anchor='middle' transform='translate(313,255)rotate(60)' style='font-size: 13px; font-family: Impact; fill: rgb(222, 158, 214);'>especial</text><text text-anchor='middle' transform='translate(-322,271)rotate(60)' style='font-size: 13px; font-family: Impact; fill: rgb(206, 109, 189);'>minhas</text><text text-anchor='middle' transform='translate(-182,-47)rotate(0)' style='font-size: 13px; font-family: Impact; fill: rgb(173, 73, 74);'>seus</text><text text-anchor='middle' transform='translate(-43,274)rotate(-30)' style='font-size: 13px; font-family: Impact; fill: rgb(107, 110, 207);'>ninguém</text><text text-anchor='middle' transform='translate(-267,275)rotate(-30)' style='font-size: 13px; font-family: Impact; fill: rgb(57, 59, 121);'>mandato</text><text text-anchor='middle' transform='translate(223,-33)rotate(60)' style='font-size: 13px; font-family: Impact; fill: rgb(82, 84, 163);'>nova</text><text text-anchor='middle' transform='translate(-143,-30)rotate(0)' style='font-size: 11px; font-family: Impact; fill: rgb(140, 109, 49);'>tudo</text><text text-anchor='middle' transform='translate(-215,105)rotate(30)' style='font-size: 11px; font-family: Impact; fill: rgb(231, 186, 82);'>lula</text><text text-anchor='middle' transform='translate(-107,230)rotate(30)' style='font-size: 11px; font-family: Impact; fill: rgb(132, 60, 57);'>agora</text><text text-anchor='middle' transform='translate(-248,145)rotate(-60)' style='font-size: 11px; font-family: Impact; fill: rgb(214, 97, 107);'>dias</text><text text-anchor='middle' transform='translate(354,-68)rotate(60)' style='font-size: 11px; font-family: Impact; fill: rgb(231, 203, 148);'>michel</text><text text-anchor='middle' transform='translate(-444,-138)rotate(-60)' style='font-size: 11px; font-family: Impact; fill: rgb(181, 207, 107);'>dignidade</text><text text-anchor='middle' transform='translate(133,282)rotate(0)' style='font-size: 11px; font-family: Impact; fill: rgb(189, 158, 57);'>desenvolvimento</text><text text-anchor='middle' transform='translate(-297,-47)rotate(-60)' style='font-size: 11px; font-family: Impact; fill: rgb(206, 219, 156);'>viva</text><text text-anchor='middle' transform='translate(-245,-90)rotate(30)' style='font-size: 11px; font-family: Impact; fill: rgb(189, 158, 57);'>santa</text><text text-anchor='middle' transform='translate(82,28)rotate(60)' style='font-size: 10px; font-family: Impact; fill: rgb(107, 110, 207);'>você</text><text text-anchor='middle' transform='translate(-97,129)rotate(60)' style='font-size: 10px; font-family: Impact; fill: rgb(222, 158, 214);'>temos</text><text text-anchor='middle' transform='translate(236,123)rotate(60)' style='font-size: 10px; font-family: Impact; fill: rgb(82, 84, 163);'>amigos</text><text text-anchor='middle' transform='translate(70,-282)rotate(30)' style='font-size: 10px; font-family: Impact; fill: rgb(165, 81, 148);'>rousseff</text><text text-anchor='middle' transform='translate(147,119)rotate(-30)' style='font-size: 10px; font-family: Impact; fill: rgb(206, 109, 189);'>milhares</text><text text-anchor='middle' transform='translate(158,-109)rotate(30)' style='font-size: 10px; font-family: Impact; fill: rgb(231, 150, 156);'>amor</text><text text-anchor='middle' transform='translate(-155,279)rotate(0)' style='font-size: 10px; font-family: Impact; fill: rgb(57, 59, 121);'>liberdade</text><text text-anchor='middle' transform='translate(-10,-90)rotate(0)' style='font-size: 10px; font-family: Impact; fill: rgb(123, 65, 115);'>poder</text><text text-anchor='middle' transform='translate(-446,116)rotate(60)' style='font-size: 10px; font-family: Impact; fill: rgb(214, 97, 107);'>deputadas</text></g></svg>"


  ?>

<!DOCTYPE html>
<head>
<script src="../d3.min.js"></script>
<script src="../jquery.js"></script>
<script src="../bootstrap.js"></script>
<script src="js/d3.parsets.js"></script>
<script src="js/highlight.min.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/bootpag.min.js"></script>
<script src="js/c3.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.nav.js"></script>
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<meta charset="utf-8">
 <title>ImpeachmentVis</title>
</head>

<style>
@import url(css/d3.parsets.css);
@import url(css/bootstrap.css);
@import url(css/c3.min.css);

body {
    background-color: #fff;
    font-family: 'Open Sans', sans-serif;
    line-height: 2;
    font-size: 16px;
}

body > section {
    padding: 85px 0;
}

p.meta, p.footer {
  font-size: 13px;
  color: #333;
}
p.meta {
  text-align: center;
}

text.icicle { pointer-events: none; }

.options { font-size: 12px; text-align: center; padding: 5px 0; padding-left: 8%; }
.curves { float: left; }
.source { float: right; }
pre, code { font-family: "Menlo", monospace; }

.html .value,
.javascript .string,
.javascript .regexp {
  color: #756bb1;
}

.html .tag,
.css .tag,
.javascript .keyword {
  color: #3182bd;
}

.comment {
  color: #636363;
}

.html .doctype,
.javascript .number {
  color: #31a354;
}

.html .attribute,
.css .attribute,
.javascript .class,
.javascript .special {
  color: #e6550d;
}

.axis path,
.axis line{
  fill: none;
  stroke: black;
}

.tick line{
    opacity: 0.2;
}

.point {
        stroke: grey;
        stroke-width: 3px;
        opacity: 0;
      }
      .point:hover{
        opacity: .5;
      }
}

select option {
  color: black;
}
select option:first-child {
  color: grey;
}
select.empty {
  color: grey;
}
/* Hidden placeholder */
select option[disabled]:first-child {
  display: none;
}

.sim {
    display:inline-block;
    position: relative;
}
.sim:after {
    content:'';
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    background: #70d3ff;
    opacity: 0.5;
    border-radius: 7px;
}

.nao {
    display:inline-block;
    position: relative;
}
.nao:after {
    content:'';
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    background: #ff5f68;
    opacity: 0.5;
    border-radius: 7px;
}

.umDeputado {
    display: inline-block;
    width: 20%;
    padding-top: 2%;
    float: left;
}

div#deputies {
    text-align: center;
    padding-bottom: 2%; 
}

.popover
{
  font-size: 14px;
  max-width: 50%;
}

#selectChartCentralized {
  padding-top: 50%;
}

.umaFala {
  width: 25%;
  display: inline-block;
  float: left;
  padding: 10px;
}

.umaFala .infoDeputado {
  background-color: lightgrey;

}

.umaFala .fala 
{
  border: 3px solid lightgrey;
  text-align: left;
  padding: 7%;
}

#page-selection, #page-selection2, #page-selection3, #page-selection4
{
  float: right;
}

#aWord, #estadoDonut {
  -webkit-animation-iteration-count: infinite; /* Chrome, Safari, Opera */
  -webkit-animation-duration: 3s;
  animation-iteration-count: infinite;
}

.brand {
  -webkit-animation-iteration-count: infinite; /* Chrome, Safari, Opera */
  -webkit-animation-duration: 5s;
  animation-iteration-count: infinite;
}

#selectedWord
{
  color:#969292;
}

.svgCloud text
{
  cursor: pointer;
}

/*sections */

h1, h2, h3,
h4, h5, h6 {
    font-family: 'Open Sans', sans-serif;
  font-weight: normal;
  margin: 0;
}

.clear:before,
.clear:after {
    content: " ";
    display: table;
}
 
.clear:after {
   clear: both;
}
 
.clear {
   *zoom: 1;
}

body > section {
    padding: 85px 0;
}

.section-title {
  margin: 0 auto 10px;
  width: 420px;
}

.section-title h2 {
  color: black;
  font-size: 25px;
  font-weight: 800;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 10px;
}

.section-title p {
    line-height: 20px;
    font-size: 15px;
    color: #1f2021;
    position: relative;
}

.sec-sub-title {
  margin: 35px 0 45px;
}

.sec-sub-title p {
  font-weight: 600;
  line-height: 24px;
  font-size: 18px;
  color: #5b646e;
  padding-left: 60px;
  padding-right: 60px;
}

.kill-margin {
    margin: 0 !important;
}

.devider {
  margin-top: 30px;
}
.devider i {
  color: #cccccc;
}

.devider:before,
.devider:after {
  content: "_____________________";
  color: #e6e8ea;
  position: relative;
  bottom: 6px;
}

.devider:before {
  right: 10px;
}

.devider:after {
  left: 10px;
}

.mb50 {
  margin-bottom: 50px;
}

/*************************
*******Navigation******
**************************/

#navigation,
.navbar-brand,
.navbar-toggle,
.navbar-nav > li > a,
.search-form > #search-sub {
  -webkit-transition: all 0.6s ease;
     -moz-transition: all 0.6s ease;
      -ms-transition: all 0.6s ease;
       -o-transition: all 0.6s ease;
          transition: all 0.6s ease;
}

.navigation .navbar-nav > li > a {
  padding: 23px 25px;
  color: #7D7D7D;
  font-size: 15px;
  font-weight: 600;
}

#navigation {
  background-color: black;
  border-bottom: 4px solid #D5DBDA
}

.navigation .navbar-nav > li.current > a {
  color: #fff;
  border-bottom: 1px solid #fff
}

.navigation .navbar-nav > li > a:focus,
.navigation .navbar-nav > li > a:hover {
  background-color: transparent;
  color: #fff;
}

.navbar-toggle {
  border: 1px solid #fff;
  margin-top: 21px;
}

.navbar-toggle .icon-bar {
  background-color: #fff;
}

/*============================================================
    Footer
============================================================*/

#footer {
    background-color: #3F5654;
    padding: 70px 0;
    color: #fff;
}

.footer-content {
    width: 600px;
    margin: 0 auto;
}

.footer-content > div {
    margin-bottom: 40px;
}

.footer-content > div > p:first-child {
    margin-bottom: 15px;
}

.footer-content .footer-instituitions {
    margin: 40px 0 35px;
}

.footer-instituitions ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
    text-align: center;
}

.footer-instituitions ul li {
    display: inline-block;
    margin: 0 10px;
}

.footer-content > p {
    color: #ababab;
    font-size: 12px;
}

/* links */

a {
    -webkit-transition: all .3s ease-in 0s;
       -moz-transition: all .3s ease-in 0s;
        -ms-transition: all .3s ease-in 0s;
         -o-transition: all .3s ease-in 0s;
            transition: all .3s ease-in 0s;
}

iframe {
    border: 0;
}

a, a:focus, a:hover {
    text-decoration: none;
    outline: 0;
}

a:focus, a:hover {
    color: "#000066";
}

#statesSection {
  background-color: #F4F7F9
}

#home{
  background-image: url('img/bgVis.png');
  width: 1300px;
  height: 700px;
  background-size: cover;
  border: solid 2px;
  text-shadow: white 0px 0px 2px;
}

.carousel-caption {
  top: 50%;
  left: 40%;
}


.carousel-caption h2 {
 font: 400 130px/0.8 'Cookie', Helvetica, sans-serif;
  color: #fff;
  text-shadow: 4px 4px 3px rgba(0,0,0,0.1);
  color: black;
}

.logo h2 {
 font: 400 50px/0.8 'Cookie', Helvetica, sans-serif;
  color: #fff;
  text-shadow: 4px 4px 3px rgba(0,0,0,0.1);
  color: white;
}

.rotate {

/* Safari */
-webkit-transform: rotate(-20deg);

/* Firefox */
-moz-transform: rotate(-20deg);

/* IE */
-ms-transform: rotate(-20deg);

/* Opera */
-o-transform: rotate(-20deg);

/* Internet Explorer */
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

}

#preloader {
  background-color: #fff;
  height: 100%;
  position: fixed;
  width: 100%;
  z-index: 1100;
}

#preloader > img {
  left: 47%;
  position: absolute;
  top: 48%;
}

.search {
    float: right;
    margin-right: 6px;
    margin-top: -20px;
    position: relative;
    z-index: 2;
}

</style>

<body>
          <!-- preloader -->
    <div id="preloader">
      <img src="img/preloader.gif" alt="Preloader">
    </div>
    <!-- end preloader -->
<!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top">
            <div class="container">
                     <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    </div>

                    <!-- logo -->
                    <a class="navbar-brand" href="#home">
                      <div class = "logo">
                         <h2>ImpeachmentVis</h2>
                      </div>
                  </a>

                     <!-- begin main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                            <li class="current"><a href="#home">Home</a></li>
                            <li><a href="#parallel">Parallel Sets</a></li>
                            <li><a href="#statesSection">Estados</a></li>
                            <li><a href="#cloudSection">Word Cloud</a></li>
                        </ul>
                    </nav>
                    <!-- /main nav -->
                </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


<section id="home">
  <div class ="container">
    <div class = "row">
      <div id = 'dimae'>
        <div class = "carousel-caption">
        <h2 class="brand flash animated rotate">ImpeachmentVis</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section id = "parallel">
  <div class = "container">
    <div class= "row text-center">
      <div class="section-title text-center mb50 fadeIn animated"> 
        <h2>Parallel sets</h2>
        <div class="devider"><i class="fa fa-laptop fa-lg"></i></div>
      </div>
      
      <div class="sec-sub-title text-center">
            <p>Com a técnica Parallel Sets você poderá visualizar os votos do Impeachment de uma forma bem interativa e interessante.
               As categorias são manipuláveis, você pode alterar a disposição como quiser.
            </p>
          </div>

      <div class="col-md-12"> 
        <div id="vis"><noscript><img src="parsets.png"></noscript></div>
        <div class="options text-center">
          <span class="curves"><label for="curved"><input type="checkbox" id="curved" onchange="curves.call(this)"> Curvas?</label></span>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
var chart = d3.parsets()
    .dimensions(["Voto", "Ideologia", "Região", "Gênero"]);

var vis = d3.select("#vis").append("svg")
    .attr("width", chart.width())
    .attr("height", chart.height());

var partition = d3.layout.partition()
    .sort(null)
    .size([chart.width(), chart.height() * 5 / 4])
    .children(function(d) { return d.children ? d3.values(d.children) : null; })
    .value(function(d) { return d.count; });

var ice = false;

function curves() {
  var t = vis.transition().duration(500);
  if (ice) {
    t.delay(1000);
    icicle();
  }
  t.call(chart.tension(this.checked ? .5 : 1));
}

d3.csv("DeputadosRegIde.csv", function(error, csv) {
  vis.datum(csv).call(chart);

  window.icicle = function() {
    var newIce = this.checked,
        tension = chart.tension();
    if (newIce === ice) return;
    if (ice = newIce) {
      var dimensions = [];
      vis.selectAll("g.dimension")
         .each(function(d) { dimensions.push(d); });
      dimensions.sort(function(a, b) { return a.y - b.y; });
      var root = d3.parsets.tree({children: {}}, csv, dimensions.map(function(d) { return d.name; }), function() { return 1; }),
          nodes = partition(root),
          nodesByPath = {};
      nodes.forEach(function(d) {
        var path = d.data.name,
            p = d;
        while ((p = p.parent) && p.data.name) {
          path = p.data.name + "\0" + path;
        }
        if (path) nodesByPath[path] = d;
      });
      var data = [];
      vis.on("mousedown.icicle", stopClick, true)
        .select(".ribbon").selectAll("path")
          .each(function(d) {
            var node = nodesByPath[d.path],
                s = d.source,
                t = d.target;
            s.node.x0 = t.node.x0 = 0;
            s.x0 = t.x0 = node.x;
            s.dx0 = s.dx;
            t.dx0 = t.dx;
            s.dx = t.dx = node.dx;
            data.push(d);
          });
      iceTransition(vis.selectAll("path"))
          .attr("d", function(d) {
            var s = d.source,
                t = d.target;
            return ribbonPath(s, t, tension);
          })
          .style("stroke-opacity", 1);
      iceTransition(vis.selectAll("text.icicle")
          .data(data)
        .enter().append("text")
          .attr("class", "icicle")
          .attr("text-anchor", "middle")
          .attr("dy", ".3em")
          .attr("transform", function(d) {
            return "translate(" + [d.source.x0 + d.source.dx / 2, d.source.dimension.y0 + d.target.dimension.y0 >> 1] + ")rotate(90)";
          })
          .text(function(d) { return d.source.dx > 15 ? d.node.name : null; })
          .style("opacity", 1e-6))
          .style("opacity", 1);
      iceTransition(vis.selectAll("g.dimension rect, g.category")
          .style("opacity", 1))
          .style("opacity", 1e-6)
          .each("end", function() { d3.select(this).attr("visibility", "hidden"); });
      iceTransition(vis.selectAll("text.dimension"))
          .attr("transform", "translate(0,-5)");
      vis.selectAll("tspan.sort").style("visibility", "hidden");
    } else {
      vis.on("mousedown.icicle", null)
        .select(".ribbon").selectAll("path")
          .each(function(d) {
            var s = d.source,
                t = d.target;
            s.node.x0 = s.node.x;
            s.x0 = s.x;
            s.dx = s.dx0;
            t.node.x0 = t.node.x;
            t.x0 = t.x;
            t.dx = t.dx0;
          });
      iceTransition(vis.selectAll("path"))
          .attr("d", function(d) {
            var s = d.source,
                t = d.target;
            return ribbonPath(s, t, tension);
          })
          .style("stroke-opacity", null);
      iceTransition(vis.selectAll("text.icicle"))
          .style("opacity", 1e-6).remove();
      iceTransition(vis.selectAll("g.dimension rect, g.category")
          .attr("visibility", null)
          .style("opacity", 1e-6))
          .style("opacity", 1);
      iceTransition(vis.selectAll("text.dimension"))
          .attr("transform", "translate(0,-25)");
      vis.selectAll("tspan.sort").style("visibility", null);
    }
  };
  d3.select("#icicle")
      .on("change", icicle)
      .each(icicle);
});

function iceTransition(g) {
  return g.transition().duration(1000);
}

function ribbonPath(s, t, tension) {
  var sx = s.node.x0 + s.x0,
      tx = t.node.x0 + t.x0,
      sy = s.dimension.y0,
      ty = t.dimension.y0;
  return (tension === 1 ? [
      "M", [sx, sy],
      "L", [tx, ty],
      "h", t.dx,
      "L", [sx + s.dx, sy],
      "Z"]
   : ["M", [sx, sy],
      "C", [sx, m0 = tension * sy + (1 - tension) * ty], " ",
           [tx, m1 = tension * ty + (1 - tension) * sy], " ", [tx, ty],
      "h", t.dx,
      "C", [tx + t.dx, m1], " ", [sx + s.dx, m0], " ", [sx + s.dx, sy],
      "Z"]).join("");
}

function stopClick() { d3.event.stopPropagation(); }

// Given a text function and width function, truncates the text if necessary to
// fit within the given width.
function truncateText(text, width) {
  return function(d, i) {
    var t = this.textContent = text(d, i),
        w = width(d, i);
    if (this.getComputedTextLength() < w) return t;
    this.textContent = "…" + t;
    var lo = 0,
        hi = t.length + 1,
        x;
    while (lo < hi) {
      var mid = lo + hi >> 1;
      if ((x = this.getSubStringLength(0, mid)) < w) lo = mid + 1;
      else hi = mid;
    }
    return lo > 1 ? t.substr(0, lo - 2) + "…" : "";
  };
}

d3.select("#file").on("change", function() {
  var file = this.files[0],
      reader = new FileReader;
  reader.onloadend = function() {
    var csv = d3.csv.parse(reader.result);
    vis.datum(csv).call(chart
        .value(csv[0].hasOwnProperty("Number") ? function(d) { return +d.Number; } : 1)
        .dimensions(function(d) { return d3.keys(d[0]).filter(function(d) { return d !== "Number"; }).sort(); }));
  };
  reader.readAsText(file);
});
</script>

  <section id = "statesSection">

    <div class="section-title text-center mb50 fadeIn animated">
        <h2>Estados</h2>
        <div class="devider"><i class="fa fa-laptop fa-lg"></i></div>
      </div>
      
      <div class="sec-sub-title text-center">
            <p> Com o <i> Stacked Bar Chart </i> abaixo é possível ter uma noção de como os votos do Impeachment foram
              evoluindo por estado e com a vantagem de ver individualmente cada deputado logo abaixo. Você poderá filtar os deputados por Estado, Partido, Gênero e Voto!
            </p>
          </div>

    <div class = "container">
      <div class= "row text-center">
        <div class="col-md-12"> 
          <div id="states"></div>
        </div>
      </div>
    </div>



    <form class="form-inline">
    <div class = "text-center">
     <div class="form-group">
      <label class="sr-only" for="selectState">Selecione um Estado</label>
      <select class="form-control empty" id="selectState" onchange="myFunction()">
        <option value="" selected>Selecione um Estado</option>
        <?php foreach ($states as $s):?>
          <option value = <?php echo "'" . $s  . "'" ?>> <?php echo $s; ?> </option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="sr-only" for="selectParties">Selecione um partido</label>
      <select class="form-control empty" id="selectParties" onchange="myFunction()">
        <option value="" selected>Selecione um partido</option>
        <?php foreach ($parties as $p):?>
          <option value = <?php echo "'" . $p  . "'" ?>> <?php echo $p; ?> </option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="sr-only" for="selectGender">Selecione um gênero</label>
      <select class="form-control empty" id="selectGender" onchange="myFunction()">
        <option value="" selected>Selecione um gênero</option>
        <option value = "Masculino">Masculino</option>
        <option value = "Feminino">Feminino</option>
      </select>
    </div>
    <div class="form-group">
      <label class="sr-only" for="selectVote">Selecione um tipo de voto</label>
      <select class="form-control empty" id="selectVote" onchange="myFunction()">
        <option value="" selected>Selecione um tipo de voto</option>
        <option value = "Sim">Sim</option>
        <option value = "Não">Não</option>
      </select>
    </div>
    </div>
  </form>

  <div class = "container">
      <div class = "row">
        <div class="col-md-12">
          <div id='page-selection'></div>
        </div>
      </div>
    </div>

    <div class = "container">
      <div class = "row" style = "padding-bottom:50px;">
        <div class="col-md-12">
          <div id = 'deputies'></div>
        </div>
      </div>
    </div>

   <div class="sec-sub-title text-center">
            <p> Os dois gráficos do tipo <i>Donut</i> abaixo mostram a distribuição dos votos a favor e contra levando em consideração
              os partidos ou o gênero. Você pode filtrar os resultados por Estado também, basta escolher um lá acima!
            </p>
          </div>

  <div class = "container">
    <div class="row">
        <div class="col-md-5"> 
          <div id="chartPartidoSim" class = 'chart animated fadeInLeft' style ="display:block;"></div>
          <div id="chartGeneroSim" class = 'chart animated fadeInLeft' style = "display:none;"></div>
        </div>
        <div class="col-md-2"> 
          <div id= "selectChartCentralized" class="form-group">
          <strong>
            <h4><div id="estadoDonut" class ="text-center animated flash"></div></h4>
          </strong>
            <label class="sr-only" for="selectCharts">Select a Chart</label>
            <select class="form-control empty" id="selectChart" onchange="showDonutChart()">
              <option selected value = "Partido">Partido</option>
              <option value = "Gênero">Gênero</option>
            </select>
            </div>
        </div>
        <div class="col-md-5"> 
          <div id="chartPartidoNao" class = 'chart animated fadeInRight' style ="display:block;" ></div>
          <div id="chartGeneroNao" class = 'chart animated fadeInRight' style = "display:none;"></div>
        </div>
      </div>
  </div>
 </section>

<script>

var margin = {top: 20, right: 55, bottom: 30, left: 40},
          width  = 1000 - margin.left - margin.right,
          height = 500  - margin.top  - margin.bottom;

      var x = d3.scale.ordinal()
          .rangeRoundBands([0, width], .1);

      var y = d3.scale.linear()
          .rangeRound([height, 0]);

      var xAxis = d3.svg.axis()
          .scale(x)
          .orient("bottom")
          .innerTickSize(-height)
          .outerTickSize(0)
          .tickPadding(10);

      var yAxis = d3.svg.axis()
          .scale(y)
          .orient("left")
          .innerTickSize(-width)
          .outerTickSize(0)
          .tickPadding(10);

      var stack = d3.layout.stack()
          .offset("zero")
          .values(function (d) { return d.values; })
          .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
          .y(function (d) { return d.value; });

      var area = d3.svg.area()
          .interpolate("cardinal")
          .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
          .y0(function (d) { return y(d.y0); })
          .y1(function (d) { return y(d.y0 + d.y); });

      var color = d3.scale.ordinal()
          .range(["#df2020","#345ee8"]);

      var svg = d3.select("#states").append("svg")
          .attr("width",  width  + margin.left + margin.right)
          .attr("height", height + margin.top  + margin.bottom)
        .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      d3.csv("data.csv", function (error, data) {

        var labelVar = 'estado';
        var varNames = d3.keys(data[0])
            .filter(function (key) { return key !== labelVar;});
        color.domain(varNames);

        var seriesArr = [], series = {};
        varNames.forEach(function (name) {
          series[name] = {name: name, values:[]};
          seriesArr.push(series[name]);
        });

        data.forEach(function (d) {
          varNames.map(function (name) {
            series[name].values.push({name: name, label: d[labelVar], value: +d[name]});
          });
        });

        x.domain(data.map(function (d) { return d.estado; }));

        stack(seriesArr);

        y.domain([0, d3.max(seriesArr, function (c) { 
            return d3.max(c.values, function (d) { return d.y0 + d.y; });
          })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
          .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("Number of Votes");

        var selection = svg.selectAll(".series")
          .data(seriesArr)
          .enter().append("g")
            .attr("class", "series");

        selection.append("path")
          .attr("class", "streamPath")
          .attr("d", function (d) { return area(d.values); })
          .style("fill", function (d) { return color(d.name); })
          .style("stroke", "black");

        var points = svg.selectAll(".seriesPoints")
          .data(seriesArr)
          .enter().append("g")
            .attr("class", "seriesPoints");

        points.selectAll(".point")
          .data(function (d) { return d.values; })
          .enter().append("circle")
           .attr("class", "point")
           .attr("cx", function (d) { return x(d.label) + x.rangeBand() / 2; })
           .attr("cy", function (d) { return y(d.y0 + d.y); })
           .attr("r", "10px")
           .style("fill",function (d) { return color(d.name); })
           .on("mouseover", function (d) { showPopover.call(this, d); })
           .on("mouseout",  function (d) { removePopovers(); })

        var legend = svg.selectAll(".legend")
            .data(varNames.slice().reverse())
          .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; });

        legend.append("rect")
            .attr("x", width - 10)
            .attr("width", 10)
            .attr("height", 10)
            .style("fill", color)
            .style("stroke", "grey");

        legend.append("text")
            .attr("x", width - 12)
            .attr("y", 6)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function (d) { return d; });

        /*svg.selectAll(".x.axis .tick")
            .style("cursor", "pointer")
            .on("click", function(d) {showDistrict(d);})*/

        function showDistrict(d)
        {
          //alert(d);
          resetFilters();
          $("#deputies").removeClass();
          myFunction(d);
          $("#deputies").addClass(d);

          $('html, body').animate({ scrollTop: $("#deputies").offset().top }, 'slow');
        }

        function removePopovers () {
          $('.popover').each(function() {
            $(this).remove();
          }); 
        }

        function showPopover (d) {
          $(this).popover({
            title: d.name,
            placement: 'auto top',
            container: 'body',
            trigger: 'manual',
            html : true,
            content: function() { 
              return "Estado: " + d.label + 
                     "<br/>Votos: " + d3.format(",")(d.value ? d.value: d.y1 - d.y0); }
          });
          $(this).popover('show')
        }

      });
</script>


  <script>
    $( document ).ready(function() {
      myFunction();
      linkAllWords();
  });
  </script>

<section id = "cloudSection">

  <div class="section-title text-center mb50 fadeIn animated">
        <h2>Word Cloud</h2>
        <div class="devider"><i class="fa fa-laptop fa-lg"></i></div>
      </div>
      
      <div class="sec-sub-title text-center">
            <p> Com a técnica Word Cloud é possível ver quais foram as principais palavras usadas pelos deputados durante a votação
              e ao clicar em uma delas é possível ver todos os deputados que a usaram. Experimente!
            </p>
          </div>

  <div class = "container">
    <div class="row text-center svgCloud">
        <div class = "col-md-12"> <?php echo $svgStaticCreated ?> </div>
    </div>
  </div>

  <div class ="container">
    <div class = "row text-center">
    <div id = "selectedWord" style = "display:none;"> 
        <h3>Palavra selecionada: </h3>
        <h4>
          <strong>
            <div id="aWord" class ="animated flash"></div>
          </strong>
        </h4>
        </div></div>
      </div>

  <div class ="container">
    <div class ="row">
      <div id='page-selection3'></div>
    </div>
    <div class ="row text-center">
      <div id = "deputiesWords"></div>
    </div>
    <div class ="row">
      <div id='page-selection2'></div>
    </div>
  </div>
</section>

<!-- 
        #footer 
        ====================================-->
        <footer id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="footer-content">
                        <div class="wow animated fadeInDown">
                            <p>Aplicação desenvolvida por <a href="http://www.inf.ufrgs.br/~rnmsilva"> Rodrigo Moni</a></p>
                        </div>
                        <div class="footer-instituitions">
                            <ul>
                                <li class="logo wow animated zoomIn">
                                    <a href="http://www.ufrgs.br">
                                        <img src="img/ufrgs.png" alt="Logo UFRGS">
                                    </a>
                                </li>
                                <li class="wow animated zoomIn" data-wow-delay="0.3s">
                                    <a href="http://www.inf.ufrgs.br">
                                        <img src="img/inf.png" alt="Logo INF">
                                    </a>
                                </li>
                                <li class="wow animated zoomIn" data-wow-delay="0.6s">
                                    <a href="http://www.inf.ufrgs.br/cg">
                                        <img src="img/graphicsLab.png" alt = "Logo Grupo CG" width = "207" height = "68">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

</body>
