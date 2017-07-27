<?php 

class RegisterForm {
    private $urlEbook = "";
    private $submitText = "";
    private $labelInit = "";
    private $actionId = "";
    function __construct($type, $urlEbook = "") {
        switch($type){
            case 'register':
                $this->labelInit = "Todo dia um conteúdo exclusivo sobre Marketing Digital. Vai perder essa oportunidade?";
                $this->submitText = "Quero Receber";
                $this->actionId = "register";
                break;
            case 'ebook':
                $this->labelInit = "Preencha os campos indicados para receber seu Ebook gratuíto!";
                $this->submitText = "Quero Receber";
                $this->actionId = "ebook";
                $this->urlEbook = $urlEbook;
                break;
            case 'cadastro':
                $this->labelInit = "Nosso objetivo é trazer tudo que pode ajudar você a se tornar o melhor profissional marketing digital para obter resultados concretos, sem achismos ou preconceitos. Vamos juntos?";
                $this->submitText = "EU QUERO!";
                $this->actionId = "register";
                break;
        }

      echo '
        <form id="'.$this->actionId.'" method="post">
      <p>'.$this->labelInit.'
        <br><span>Fique tranquilo, não vamos mandar spam</span>
      </p>
      <div class="input-group">
        <input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
      </div>
      <div class="input-group">
        <input class="form-control" type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <!--<input class="form-control" type="text" name="idade" placeholder="Idade" required>-->
        <select class="form-control" name="idade" required>
            <option value="" disabled selected>Qual sua idade?</option>
            <option value="1">Até 17 anos</option>
            <option value="2">De 18 a 24 anos</option>
            <option value="3">De 25 a 34 anos</option>
            <option value="4">De 35 a 44 anos</option>
            <option value="5">Acima de 45 anos</option>
        </select>
      </div>
      <div class="input-group">
        <select class="form-control" name="escolaridade" required>
            <option value="" disabled selected>Qual sua escolaridade?</option>
            <option value="1">Ensino Fundamental</option>
            <option value="2">Ensino Médio</option>
            <option value="3">Ensino Superior (cursando ou completo)</option>
        </select>
      </div>
       <div class="input-group">
        <select class="form-control" name="interesse" required>
            <option value="0" disabled selected>Qual sua área de interesse?</option>
            <option value="1">Inbound Marketing</option>
            <option value="2">SEO/SEM</option>
            <option value="3">Data Metrics</option>
            <option value="4">Growth Hacking</option>
            <option value="5">Não tenho interesse em Marketing Digital</option>
        </select>
      </div>
      <span>Preencha todos os campos!</span>
      <input type="text" name="ebook" value="'.($this->urlEbook === "" ? "" : $this->urlEbook).'" hidden>
      <input type="submit" class="form-control submit" value="'.$this->submitText.'">
      <p></p>
      <div class="alert none">
      </div>
    </form>';
    }
}


?>

