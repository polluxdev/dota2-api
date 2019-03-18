<!DOCTYPE html>
<html>
<head>
    <!-- judul di tab bar -->
    <title>Dota 2 Wik Wik</title>
    <!-- ikon di tab bar -->
    <link rel="icon" href="icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- css untuk konten -->
    <style>

    * {
        margin: 0;
        padding: 0;
    }

    .container {
        position: relative;
        background-image: url("https://dmarket.com/blog/best-dota2-wallpapers/dota2heroes7_hu3b1dceb244ec3fefbad73471cde2e900_222198_1920x1080_resize_q75_box.jpg");
        background-size: 100%;
        background-attachment:fixed;
        min-height:100vh;    
        overflow:auto;
    }

    .title, form {
        font-family: sans-serif;
        text-align: center;
        color: #fff;
        margin-bottom: 35px;
        padding-top: 30px;
        font-family: "Comic Sans MS", cursive, sans-serif;
        font-size: 48px;
    }

    .search {
        position: relative;
        font-family: "Comic Sans MS", cursive, sans-serif;
       
    }
    .search form{
      
        width:300px;
        margin:0px auto;
        position:relative;
    }
    .search form .input {
        line-height: 1.2;
        color: #333;
        display: inline;
        width: 200px;
        background: #fff;
        height: 30px;
        border-radius: 25px;
        padding-left: 20px;
    }

    .search_button {
        background: transparent;
        color: white;
        border: none;
        position:absolute;
        top:67px;   
        left:280px;
        cursor:pointer;
    }
    .search_button:hover {
        color: #35A9DB;
    }

    .button {
        position: relative;
        margin-bottom: 40px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .button a {
        display: block;
        margin: 20px auto;
        width: 15%;
        text-align: center;
        padding: 10px;
        background: rgba(255,255,255,0.3);
        color: white;
        border-radius: 25px;
    }

    .button a:hover {
        background: #35A9DB;
        color: white;
    }

    .tabel {
        min-height: 100%;
        position: relative;
    }

    .table {
        max-width: 100%;
        border-collapse: collapse;
        color: #444;
        overflow: auto;
        position: relative;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, 0%);
        -moz-box-shadow: 0 0 5px 5px #000;
        -webkit-box-shadow: 0 0 5px 5px #000;
        box-shadow: 0 0 5px 5px #000;
    }

    .table th {
        font-family: Arial, Helvetica, sans-serif;
    }

    .table tr th{
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }

    .table, th, td {
        padding: 8px 30px;
        text-align: center;
    }
    
    .table tr:nth-child(even) {
        background-color: #DCDCDC;
    }

    .table tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .table tr td {
        padding: 20px;
    }

    .table td {
        font-family: Impact, Charcoal, sans-serif;
    }

    .table img {
        border-radius: 30px;
    }

    footer {
        text-align: center;
        background: #35A9DB;
        color: #fff;
        padding: 10px 0px;
        margin-top: 50px;
        position: absolute;
        bottom: 0px;
        width: 100%;
        overflow: hidden;
    }

    a:link {
        text-decoration: none;
        font-weight: bold;
        color: #444;
    }

    a:hover {
        color: #35A9DB;
    }

    li {
        text-align: left;
        margin: 8px;
    }

    .ability_table {
        min-height: 100%;
        position: relative;
    }

    .ability {
        max-width: 100%;
        border-collapse: collapse;
        font-family: sans-serif;
        color: #444;
        margin: 0;
        position: relative;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, 50%);
    }

    .ability tr, th, td {
        border: 1px solid white;
        padding: 10px;
        vertical-align: center;
    }

    .ability th {
        background: #35A9DB;
        color: #fff;
        font-weight: normal;

    }

    .ability td {
        background: #F0F0F0;
        color: #000;
        font-weight: bold;
    }

    </style>
</head>
<body>
    <!-- div kontainer supaya tidak rusak ketika diresize -->
    <div class="container">
        <!-- judul konten -->
        <p class="title">Dota 2 Heroes</p>
        <!-- untuk memanggil json dari API -->
        <?php
            $sumber = 'https://api.opendota.com/api/heroStats';
            $konten = file_get_contents($sumber);
            $data = json_decode($konten, true);
        ?>
        <!-- div untuk input search hero dan tombol search -->
        <div class="search">
            <form action="" method="get">
                <input class="input" type="text" name="display" placeholder="Search for hero's name ...">
                <button class="search_button" type="submit"><i class="fas fa-search fa-2x"></i></button>
            </form>
        </div>
        <!-- div untuk menampilkan semua hero -->
        <div class="button">
            <a href="http://<?php echo $_SERVER['SERVER_NAME'].'/'.basename(__DIR__)?>">SHOW ALL HEROES</a>
        </div>
        <!-- untuk validasi variabel hero yang namanya akan diinputkan-->
        <?php if(isset($_GET['display'])){ ?>
        <!-- div untuk menampilkan tabel hero yang namanya sudah diinputkan -->
        <div class="tabel">
            <table class=table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Primary Attribute</th>
                    <th>Type</th>
                    <th>Roles</th>
                </tr>
            <!-- untuk memanggil atribut yang ada di json dari hero yang namanya sudah diinputkan dan menampilkannya -->
            <?php
                for($i=0;$i<count($data);$i++){
                    if(strtolower($data[$i]["localized_name"]) ==  $_GET['display']){
                        echo "<td><img src='http://cdn.dota2.com".$data[$i]['img']."'></td>";
                        echo "<td>".$data[$i]['localized_name']."</td>";
                        if ($data[$i]['primary_attr'] == "str"){
                            echo "<td><a href='?ability=".strtolower($data[$i]['localized_name'])."'>Strength</a></td>";
                        } else if ($data[$i]['primary_attr'] == "agi"){
                            echo "<td><a href='?ability=".strtolower($data[$i]['localized_name'])."'>Agility</a></td>";
                        } else {
                            echo "<td><a href='?ability=".strtolower($data[$i]['localized_name'])."'>Intelligence</a></td>";
                        }
                        echo "<td>".$data[$i]['attack_type']."</td>";
                        echo "<td>";
                        for($j=0;$j <count($data[$i]['roles']);$j++){
                            echo "<li>".$data[$i]['roles'][$j]."</li>";
                        }
                        echo "</td>";  
                        echo "</tr>";
                    }
                }
            ?>
            </table>
        </div>
        <!-- untuk validasi variabel ability dari semua hero -->
        <?php }else if(isset($_GET['ability'])){ ?>
        <!-- untuk menampilkan tabel ability dari masing-masing hero -->
        <div class="ability_table">
            <table class="ability">
                <tr>
                    <th><span class="tooltip" title="<?php echo ucwords($_GET['ability']); ?>" style="cursor: help; border-bottom: 1px dotted;">Hero</th>
                    <th><span class="tooltip" title="Primary attribute" style="cursor: help; border-bottom: 1px dotted;">A</span></th>
                    <th><span class="tooltip" title="Base Health" style="cursor: help; border-bottom: 1px dotted;">HP</span></th>
                    <th><span class="tooltip" title="Base Health Regeneration" style="cursor: help; border-bottom: 1px dotted;">HP+</span></th>
                    <th><span class="tooltip" title="Base Strength" style="cursor: help; border-bottom: 1px dotted;">STR</span></th>
                    <th><span class="tooltip" title="Strength Growth per Level" style="cursor: help; border-bottom: 1px dotted;">STR+</span></th>
                    <th><span class="tooltip" title="Base Agility" style="cursor: help; border-bottom: 1px dotted;">AGI</span></th>
                    <th><span class="tooltip" title="Agility Growth per Level" style="cursor: help; border-bottom: 1px dotted;">AGI+</span></th>
                    <th><span class="tooltip" title="Base Intelligence" style="cursor: help; border-bottom: 1px dotted;">INT</span></th>
                    <th><span class="tooltip" title="Intelligence Growth per Level" style="cursor: help; border-bottom: 1px dotted;">INT+</span></th>
                    <th><span class="tooltip" title="Total Base Attributes" style="cursor: help; border-bottom: 1px dotted;">T</span></th>
                    <th><span class="tooltip" title="Total Attributes Growth per Level" style="cursor: help; border-bottom: 1px dotted;">T+</span></th>
                    <th><span class="tooltip" title="Base Movement Speed" style="cursor: help; border-bottom: 1px dotted;">MS</span></th>
                    <th><span class="tooltip" title="Base Armor" style="cursor: help; border-bottom: 1px dotted;">MA</span></th>
                    <th><span class="tooltip" title="Base Magic Resistence" style="cursor: help; border-bottom: 1px dotted;">MR</span></th>
                    <th><span class="tooltip" title="Base Mana" style="cursor: help; border-bottom: 1px dotted;">MN</span></th>
                    <th><span class="tooltip" title="Base Attack Minimum" style="cursor: help; border-bottom: 1px dotted;">BA(MIN)</span></th>
                    <th><span class="tooltip" title="Base Attack Maximum" style="cursor: help; border-bottom: 1px dotted;">BA(MAX)</span></th>
                    <th><span class="tooltip" title="Base Attack Range" style="cursor: help; border-bottom: 1px dotted;">AR</span></th>
                    <th><span class="tooltip" title="Base Attack Time" style="cursor: help; border-bottom: 1px dotted;">BAT</span></th>
                    <th><span class="tooltip" title="Turn Rate" style="cursor: help; border-bottom: 1px dotted;">TR</span></th>
                    <th><span class="tooltip" title="Legs" style="cursor: help; border-bottom: 1px dotted;">L</span></th>
                </tr>
        <!-- untuk memanggil atribut masing-masing hero dari json dan menampilkannya -->
        <?php
            for($m=0;$m<count($data);$m++){
                if(strtolower($data[$m]["localized_name"]) ==  $_GET['ability']){
                    $attribute = null;
                    echo "<td><img src='http://cdn.dota2.com".$data[$m]['icon']."'><p><a href='?display=".strtolower($data[$m]['localized_name'])."'>".$data[$m]["localized_name"]."</a></p></td>";
                    if ($data[$m]['primary_attr'] == "str"){
                        $attribute = "Strength";
                        echo "<td><span class='tooltip' title=".$attribute." style='cursor: pointer; border-bottom: 1px dotted;'><img src='https://c-4tvylwolbz88x24nhtlwlkphx2ejbyzljkux2ejvt.g00.gamepedia.com/g00/3_c-4kvah9.nhtlwlkph.jvt_/c-4TVYLWOLBZ88x24oaawzx3ax2fx2fnhtlwlkph.jbyzljku.jvtx2fkvah9_nhtlwlkphx2f4x2f4hx2fZaylunao_haaypibal_zftivs.wunx3fclyzpvux3dk5231jj38518i3h583h6i8l3mk295m68_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></span></td>";
                    } else if ($data[$m]['primary_attr'] == "agi"){
                        $attribute = "Agility";
                        echo "<td><span class='tooltip' title=".$attribute." style='cursor: pointer; border-bottom: 1px dotted;'><img src='https://c-7npsfqifvt0x24hbnfqfejbx2edvstfdeox2edpn.g00.gamepedia.com/g00/3_c-7epub3.hbnfqfejb.dpn_/c-7NPSFQIFVT0x24iuuqtx3ax2fx2fhbnfqfejb.dvstfdeo.dpnx2fepub3_hbnfqfejbx2f3x2f3ex2fBhjmjuz_buusjcvuf_tzncpm.qohx3fwfstjpox3d1530008c9c6d8c9206b46g820fg2811b_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></span></td>";
                    } else {
                        $attribute = "Intelligence";
                        echo "<td><span class='tooltip' title=".$attribute." style='cursor: pointer; border-bottom: 1px dotted;'><img src='https://c-7npsfqifvt0x24hbnfqfejbx2edvstfdeox2edpn.g00.gamepedia.com/g00/3_c-7epub3.hbnfqfejb.dpn_/c-7NPSFQIFVT0x24iuuqtx3ax2fx2fhbnfqfejb.dvstfdeo.dpnx2fepub3_hbnfqfejbx2f6x2f67x2fJoufmmjhfodf_buusjcvuf_tzncpm.qohx3fwfstjpox3d8f41290cf8b8d26990b3d356695808eb_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></span></td>";
                    }
                    echo "<td>".$data[$m]['base_health']."</td>";
                    echo "<td>".$data[$m]['base_health_regen']."</td>";
                    echo "<td>".$data[$m]['base_str']."</td>";
                    echo "<td>".$data[$m]['str_gain']."</td>";
                    echo "<td>".$data[$m]['base_agi']."</td>";
                    echo "<td>".$data[$m]['agi_gain']."</td>";
                    echo "<td>".$data[$m]['base_int']."</td>";
                    echo "<td>".$data[$m]['int_gain']."</td>";
                    $t = $data[$m]['base_str']+$data[$m]['base_agi']+$data[$m]['base_int'];
                    echo "<td>".$t."</td>";
                    $tp = $data[$m]['str_gain']+$data[$m]['agi_gain']+$data[$m]['int_gain'];
                    echo "<td>".$tp."</td>";
                    echo "<td>".$data[$m]['move_speed']."</td>";
                    $ma = $data[$m]['base_agi']*0.16+$data[$m]['base_armor'];
                    echo "<td>".$ma."</td>";
                    echo "<td>".$data[$m]['base_mr']."</td>";
                    echo "<td>".$data[$m]['base_mana']."</td>";
                    echo "<td>".$data[$m]['base_attack_min']."</td>";
                    echo "<td>".$data[$m]['base_attack_max']."</td>";
                    echo "<td>".$data[$m]['attack_range']."</td>";
                    echo "<td>".$data[$m]['attack_rate']."</td>";
                    echo "<td>".$data[$m]['turn_rate']."</td>";
                    echo "<td>".$data[$m]['legs']."</td>";
                    echo "</tr>";
                }
            }
        ?>

            </table>
        </div>
        <!-- untuk validasi variabel yang menampilkan semua hero -->
        <?php }else{ ?>
        <!-- untuk menampilkan tabel semua hero -->
        <div class="tabel">
            <table class="table">
                <tr>
                    <th>Number</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Primary Attribute</th>
                    <th>Type</th>
                    <th>Roles</th>
                </tr>
        <!-- untuk memanggil semua hero dari json -->
        <?php
            for($a=0; $a < count($data); $a++){
                echo "<tr>";
                echo "<td>".$data[$a]['id']."</td>";
                echo "<td><img src='http://cdn.dota2.com".$data[$a]['img']."'></td>";
                echo "<td><a href='?display=".strtolower($data[$a]['localized_name'])."'>".$data[$a]['localized_name']."</a></td>";
                if ($data[$a]['primary_attr'] == "str"){
                    echo "<td><a href='?ability=".strtolower($data[$a]['localized_name'])."'>Strength</a></td>";
                } else if ($data[$a]['primary_attr'] == "agi"){
                    echo "<td><a href='?ability=".strtolower($data[$a]['localized_name'])."'>Agility</a></td>";
                } else {
                    echo "<td><a href='?ability=".strtolower($data[$a]['localized_name'])."'>Intelligence</a></td>";
                }
                echo "<td>".$data[$a]['attack_type']."</td>";
                echo "<td>";
                for($i=0;$i <count($data[$a]['roles']);$i++){
                    echo "<li>".$data[$a]['roles'][$i] ."</li>";    
                }
                echo "</td>";  
                echo "</tr>";
            }
        ?>

            </table>
        </div>

        <?php
            } 
        ?>
    <!-- untuk footer -->
    <div style="margin-top:80px;"></div>
        <footer>
            <div>
                <p>&copy; 2019 FAHMI NUR ROSYID</p>
            </div>
        </footer>
    </div>
</body>
</html>