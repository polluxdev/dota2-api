<!DOCTYPE html>
<html>
<head>
    <!-- judul di tab bar -->
    <title>Dota 2 Wik Wik</title>
    <!-- ikon di tab bar -->
    <link rel="icon" href="icon.png" type="image/gif" sizes="16x16">
    <!-- css untuk konten -->
    <style>

    .container {
        position: relative;
    }

    h1, h3, form {
        font-family: sans-serif;
        text-align: center;
    }

    .search {
        position: relative;
        background: red;
       
    }
    .search form{
      
        width:300px;
        margin:0px auto;
    }
    .search form #input {
        line-height: 1.2;
        color: #333;
        display: inline;
        width: 10%;
        background: #fff;
        height: 30px;
        border-radius: 25px;
        padding: 0 30px 0 53px;
    }

    .button {
        position: relative;
        background: blue;
        margin-bottom: 40px;
    }

    .tabel {
        min-height: 100%;
        position: relative;
    }

    .table {
        max-width: 100%;
        border-collapse: collapse;
        font-family: sans-serif;
        color: #444;
        margin: 0;
        position: relative;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, 0%);
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
        background-color: #f2f2f2;
    }

    .table tr td {
        padding: 20px;
    }

    footer {
        text-align: center;
        background: #35A9DB;
        color: #fff;
        padding: 5px;
        margin-top: 20px;
    }

    a:link {
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        color: hotpink;
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
        <h1>Dota 2 Heroes</h1>
        <h3>Search Hero</h3>

    <?php
        $sumber = 'https://api.opendota.com/api/heroStats';
        $konten = file_get_contents($sumber);
        $data = json_decode($konten, true);
    ?>

    <div class="search">
        <form action="" method="get">
            <input id="input" type="text" name="display">
            <input type="submit">
        </form>
    </div>
    
    <div class="button">
        <a href="?show=all">Show All</a>

        <a href="http://<?php echo $_SERVER['SERVER_NAME'].'/'.basename(__DIR__)?>">REFRESH</a>
    </div>
        
    <?php
        if(isset($_GET['ability'])){
    ?>
        <div class="ability_table">
        <table class="ability">
            <tr>
                <th>Hero</th>
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

    <?php
        for($m=0;$m<count($data);$m++){
            if(strtolower($data[$m]["localized_name"]) ==  $_GET['ability']){
                echo "<td><img src='http://cdn.dota2.com".$data[$m]['icon']."'><p>".$data[$m]["localized_name"]."</p></td>";
                if ($data[$m]['primary_attr'] == "str"){
                    echo "<td><img src='https://c-4tvylwolbz88x24nhtlwlkphx2ejbyzljkux2ejvt.g00.gamepedia.com/g00/3_c-4kvah9.nhtlwlkph.jvt_/c-4TVYLWOLBZ88x24oaawzx3ax2fx2fnhtlwlkph.jbyzljku.jvtx2fkvah9_nhtlwlkphx2f4x2f4hx2fZaylunao_haaypibal_zftivs.wunx3fclyzpvux3dk5231jj38518i3h583h6i8l3mk295m68_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></td>";
                } else if ($data[$m]['primary_attr'] == "agi"){
                    echo "<td><img src='https://c-7npsfqifvt0x24hbnfqfejbx2edvstfdeox2edpn.g00.gamepedia.com/g00/3_c-7epub3.hbnfqfejb.dpn_/c-7NPSFQIFVT0x24iuuqtx3ax2fx2fhbnfqfejb.dvstfdeo.dpnx2fepub3_hbnfqfejbx2f3x2f3ex2fBhjmjuz_buusjcvuf_tzncpm.qohx3fwfstjpox3d1530008c9c6d8c9206b46g820fg2811b_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></td>";
                } else {
                    echo "<td><img src='https://c-7npsfqifvt0x24hbnfqfejbx2edvstfdeox2edpn.g00.gamepedia.com/g00/3_c-7epub3.hbnfqfejb.dpn_/c-7NPSFQIFVT0x24iuuqtx3ax2fx2fhbnfqfejb.dvstfdeo.dpnx2fepub3_hbnfqfejbx2f6x2f67x2fJoufmmjhfodf_buusjcvuf_tzncpm.qohx3fwfstjpox3d8f41290cf8b8d26990b3d356695808eb_$/$/$/$/$?i10c.ua=1&i10c.dv=24'></td>";
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

    <?php
        }
    ?>

    <?php
        if(isset($_GET['display'])){
    ?>

    <div class="tabel">
        <table class=table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Primary Attribute</th>
                <th>Type</th>
                <th>Roles</th>
            </tr>

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

    <?php
        }else if(isset($_GET['show'])){
    ?>

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
    <?php
        for($a=0; $a < count($data); $a++){
            echo "<tr>";
            echo "<td>".$data[$a]['id']."</td>";
            echo "<td><img src='http://cdn.dota2.com".$data[$a]['img']."'></td>";
            echo "<td>".$data[$a]['localized_name']."</td>";
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

    </div>
</body>