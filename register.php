<?php
session_start();
include("PHP/conexion.php");
if (empty($_SESSION['user'])){
  $iniciarSesion = '<a href="login.php" class="iniciarSesion"></a>';
}else{
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="utf-8">
    <title>Crear una cuenta</title>
    <link rel="icon" href="favicon.png">
  </head>
  <body class="background">

    <header class="headerStyle">
      <div class="headerCont">
        <div class="headerArea1">
          <a href="index.php"><img src="Images/globalheader.png"></img></a>
        </div>
        <div class="headerArea2">
          <div class="headerButtons">
            <a>MI CUENTA</a>
            <a>COMUNIDAD</a>
            <a>ACERCA DE</a>
            <a>SOPORTE</a>
          </div>
        </div>
        <div class="headerArea3">
          <a href="login.php" class="iniciarSesion">Iniciar Sesión</a>
        </div>
      </div>
    </header>

      <?php
      if(isset($_GET["userAlreadyExists"]) && $_GET["userAlreadyExists"] == 'true'){
        echo '<div class="logError"><a>El nombre de usuario que has introducido ya existe.</a></div>';
      }
      if(isset($_GET["mailAlreadyExists"]) && $_GET["mailAlreadyExists"] == 'true'){
        echo '<div class="logError"><a>La dirección de correo electrónico que has introducido ya existe.</a></div>';
      }
      if(isset($_GET["passNoMatch"]) && $_GET["passNoMatch"] == 'true'){
        echo '<div class="logError"><a>Las contraseñas que has introducido no coinciden.</a></div>';
      }
      if(isset($_GET["emailNoMatch"]) && $_GET["emailNoMatch"] == 'true'){
        echo '<div class="logError"><a>Las direcciones de correo electrónico que has introducido no coinciden.</a></div>';
      }
      if(isset($_GET["invalidEmail"]) && $_GET["invalidEmail"] == 'true'){
        echo '<div class="logError"><a>La dirección de correo electrónico que has introducido no es válida.</a></div>';
      }
      ?>

      <form method="post" action="verificacion.php" class="regForm">
        <div class="regFormArea1">
          <a class="textStyle2 logPos">Nombre de usuario</a>
          <input type="text" class="inputStyle logPos2" name="user"/>
          <a class="textStyle2 logPos">Dirección de email actual</a>
          <input type="text" class="inputStyle logPos2" name="mail"/>
          <a class="textStyle2 logPos">Vuelve a introducir email actual</a>
          <input type="text" class="inputStyle logPos2" name="verMail"/>
          <a class="textStyle2 logPos">Contraseña</a>
          <input type="password" class="inputStyle logPos2" name="pass"/>
          <a class="textStyle2 logPos">Vuelve a introducir contraseña</a>
          <input type="password" class="inputStyle logPos2" name="verPass"/>
          <a class="textStyle2 logPos">Tu país de residencia</a>
          <select class="countryStyle logPos2" name="country">
            <option value="Afganistán">Afganistán</option>
            <option value="Albania">Albania</option>
            <option value="Alemania">Alemania</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Antigua y Barbuda">Antigua y Barbuda</option>
            <option value="Arabia Saudita">Arabia Saudita</option>
            <option value="Argelia">Argelia</option>
            <option value="Argentina" selected="selected">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaiyán">Azerbaiyán</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bangladés">Bangladés</option>
            <option value="Barbados">Barbados</option>
            <option value="Baréin">Baréin</option>
            <option value="Bélgica">Bélgica</option>
            <option value="Belice">Belice</option>
            <option value="Benín">Benín</option>
            <option value="Bielorrusia">Bielorrusia</option>
            <option value="Birmania">Birmania</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
            <option value="Botsuana">Botsuana</option>
            <option value="Brasil">Brasil</option>
            <option value="Brunéi">Brunéi</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Bután">Bután</option>
            <option value="Cabo Verde">Cabo Verde</option>
            <option value="Camboya">Camboya</option>
            <option value="Camerún">Camerún</option>
            <option value="Canadá">Canadá</option>
            <option value="Catar">Catar</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Chipre">Chipre</option>
            <option value="Ciudad del Vaticano">Ciudad del Vaticano</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoras">Comoras</option>
            <option value="Corea del Norte">Corea del Norte</option>
            <option value="Corea del Sur">Corea del Sur</option>
            <option value="Costa de Marfil">Costa de Marfil</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croacia">Croacia</option>
            <option value="Cuba">Cuba</option>
            <option value="Dinamarca">Dinamarca</option>
            <option value="Dominica">Dominica</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egipto">Egipto</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Eslovaquia">Eslovaquia</option>
            <option value="Eslovenia">Eslovenia</option>
            <option value="España">España</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Estonia">Estonia</option>
            <option value="Etiopía">Etiopía</option>
            <option value="Filipinas">Filipinas</option>
            <option value="Finlandia">Finlandia</option>
            <option value="Fiyi">Fiyi</option>
            <option value="Francia">Francia</option>
            <option value="Gabón">Gabón</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Ghana">Ghana</option>
            <option value="Granada">Granada</option>
            <option value="Grecia">Grecia</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guyana">Guyana</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bisáu">Guinea-Bisáu</option>
            <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
            <option value="Haití">Haití</option>
            <option value="Honduras">Honduras</option>
            <option value="Hungría">Hungría</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Irak">Irak</option>
            <option value="Irán">Irán</option>
            <option value="Irlanda">Irlanda</option>
            <option value="Islandia">Islandia</option>
            <option value="Islas Marshall">Islas Marshall</option>
            <option value="Islas Salomón">Islas Salomón</option>
            <option value="IsraelIsrael">Israel</option>
            <option value="Italia">Italia</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japón">Japón</option>
            <option value=Jordania"">Jordania</option>
            <option value="Kazajistán">Kazajistán</option>
            <option value="Kenia">Kenia</option>
            <option value="Kirguistán">Kirguistán</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Laos">Laos</option>
            <option value="Lesoto">Lesoto</option>
            <option value="Letonia">Letonia</option>
            <option value="Líbano">Líbano</option>
            <option value="Liberia">Liberia</option>
            <option value="Libia">Libia</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lituania">Lituania</option>
            <option value="Luxemburgo">Luxemburgo</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malasia">Malasia</option>
            <option value="Malaui">Malaui</option>
            <option value="Maldivas">Maldivas</option>
            <option value="Malí">Malí</option>
            <option value="Malta">Malta</option>
            <option value="Marruecos">Marruecos</option>
            <option value="Mauricio">Mauricio</option>
            <option value="Mauritania">Mauritania</option>
            <option value="México">México</option>
            <option value="Micronesia">Micronesia</option>
            <option value="Moldavia">Moldavia</option>
            <option value="Mónaco">Mónaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Níger">Níger</option>
            <option value="Nigeria">Nigeria</option>.
            <option value="Noruega">Noruega</option>
            <option value="Nueva Zelanda">Nueva Zelanda</option>
            <option value="Omán">Omán</option>
            <option value="Países Bajos">Países Bajos</option>
            <option value="Pakistán">Pakistán</option>
            <option value="Palaos">Palaos</option>
            <option value="Panamá">Panamá</option>
            <option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>.
            <option value="Paraguay">Paraguay</option>
            <option value="Perú">Perú</option>
            <option value="Polonia">Polonia</option>
            <option value="Portugal">Portugal</option>
            <option value="Reino Unido de Gran Bretaña e Irlanda del Norte">Reino Unido de Gran Bretaña e Irlanda del Norte</option>
            <option value="República Centroafricana">República Centroafricana</option>
            <option value="República Checa">República Checa</option>
            <option value="República de Macedonia">República de Macedonia</option>
            <option value="República del Congo">República del Congo</option>
            <option value="República Democrática del Congo">República Democrática del Congo</option>
            <option value="República Dominicana">República Dominicana</option>
            <option value="República Sudafricana">República Sudafricana</option>
            <option value="Ruanda">Ruanda</option>
            <option value="Rumanía">Rumanía</option>
            <option value="Rusia">Rusia</option>
            <option value="Samoa">Samoa</option>
            <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
            <option value="San Marino">San Marino</option>
            <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
            <option value="Santa Lucía">Santa Lucía</option>
            <option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leona">Sierra Leona</option>
            <option value="Singapur">Singapur</option>
            <option value="Siria">Siria</option>
            <option value="Somalia">Somalia</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Suazilandia">Suazilandia</option>
            <option value="Sudán">Sudán</option>
            <option value="Sudán del Sur">Sudán del Sur</option>
            <option value="Suecia">Suecia</option>
            <option value="Suiza">Suiza</option>
            <option value="Surinam">Surinam</option>
            <option value="Tailandia">Tailandia</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Tayikistán">Tayikistán</option>
            <option value="Timor Oriental">Timor Oriental</option>
            <option value="Togo">Togo</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad y Tobago">Trinidad y Tobago</option>
            <option value="Túnez">Túnez</option>
            <option value="Turkmenistán">Turkmenistán</option>
            <option value="Turquía">Turquía</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Ucrania">Ucrania</option>
            <option value="Uganda">Uganda</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistánt">Uzbekistánt</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Yemen">Yemen</option>
            <option value="YibutiYibuti">Yibuti</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabue">Zimbabue</option>
          </select>
          <a class="textStyle2 logPos">Fecha de nacimiento</a>
          <div class="dateDiv">
            <select class="dateStyle logPos2" style="width: 20%;" name="day">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <select class="dateStyle logPos2" style="width: 50%;" name="month">
              <option value="01">Enero</option>
              <option value="02">Febrero</option>
              <option value="03">Marzo</option>
              <option value="04">Abril</option>
              <option value="05">Mayo</option>
              <option value="06">Junio</option>
              <option value="07">Julio</option>
              <option value="08">Agosto</option>
              <option value="09">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
            <select class="dateStyle logPos2" style="width: 30%;" name="year">
              <option value="1900">1900</option>
              <option value="1901">1901</option>
              <option value="1902">1902</option>
              <option value="1903">1903</option>
              <option value="1904">1904</option>
              <option value="1905">1905</option>
              <option value="1906">1906</option>
              <option value="1907">1907</option>
              <option value="1908">1908</option>
              <option value="1909">1909</option>
              <option value="1910">1910</option>
              <option value="1911">1911</option>
              <option value="1912">1912</option>
              <option value="1913">1914</option>
              <option value="1914">1914</option>
              <option value="1915">1915</option>
              <option value="1916">1916</option>
              <option value="1917">1917</option>
              <option value="1918">1918</option>
              <option value="1919">1919</option>
              <option value="1920">1920</option>
              <option value="1921">1921</option>
              <option value="1922">1922</option>
              <option value="1923">1923</option>
              <option value="1924">1924</option>
              <option value="1925">1925</option>
              <option value="1926">1926</option>
              <option value="1927">1927</option>
              <option value="1928">1928</option>
              <option value="1929">1930</option>
              <option value="1931">1931</option>
              <option value="1932">1932</option>
              <option value="1933">1933</option>
              <option value="1934">1934</option>
              <option value="1935">1935</option>
              <option value="1936">1936</option>
              <option value="1937">1937</option>
              <option value="1938">1938</option>
              <option value="1939">1939</option>
              <option value="1940">1940</option>
              <option value="1941">1941</option>
              <option value="1942">1942</option>
              <option value="1943">1943</option>
              <option value="1944">1944</option>
              <option value="1945">1945</option>
              <option value="1946">1946</option>
              <option value="1947">1947</option>
              <option value="1948">1948</option>
              <option value="1949">1949</option>
              <option value="1950">1951</option>
              <option value="1951">1951</option>
              <option value="1952">1952</option>
              <option value="1953">1953</option>
              <option value="1954">1954</option>
              <option value="1955">1955</option>
              <option value="1956">1956</option>
              <option value="1957">1957</option>
              <option value="1958">1958</option>
              <option value="1959">1959</option>
              <option value="1960">1960</option>
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>
              <option value="1970">1970</option>
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2017</option>
              <option value="2018">2018</option>
              <option value="2019" selected="selected">2019</option>
            </select>
          </div>
          <button type="submit" class="submitStyle" style="margin: 40px 0 0 20px;">Crear cuenta</button>
        </div>
        <div class="regFormArea2">
          <a class="textStyle2 regPos">Tu nombre de perfil es visible para cualquiera que visite tu perfil y sirve para representarte en los juegos multijugador.</a>
          <a class="textStyle2 regPos2">Tu dirección de email se utiliza para confirmar las compras y ayudarte a administrar el acceso a tu cuenta de Northem.</a>
          <a class="textStyle2 regPos3">Tu contraseña no debe ser compartida con nadie y se te pedira cada vez quieras acceder a tu cuenta.</a>
          <a class="textStyle2 regPos4">Tu pais de residencia determinara la moneda que se usara al realizar transacciones.</a>
          <a class="textStyle2 regPos5">Tu fecha de nacimiento se usara para determinar el acceso a diferentes contenidos.</a>
        </div>
      </form>
  </body>
</html>
