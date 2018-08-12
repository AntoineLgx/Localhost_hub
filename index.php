<link href="assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/noscript.css" />
<div id="wrapper">
    <div id="main">
		<div class="inner">
			<div id="">
				<section class="tiles">
<?php 

$info = array(); $x=0;

$count =0;
$Thisfile   = fopen('C:\wamp64\bin\apache\apache2.4.33\conf\extra\httpd-vhosts.conf','r');
    while(!feof($Thisfile)){
        $line = fgets($Thisfile);
        $line = trim($line);
       // CHECK IF STRING BEGINS WITH ServerAlias
        $tokens = explode(' ',$line);
            $x ++;
            if($count==12){
                $count =0;
            }
            $count ++;
            $style = "style".$count;
            $pict = "pic".$count.".jpg";
        if(!empty($tokens)){
            //var_dump(strtolower($tokens[0]));
            if(strtolower($tokens[0])=="<virtualhost"){
                if($tokens[1]=="*:443>"){
                    $siteType=  "https";
                }else{
                    $siteType = "http";
                }
            }
          
           
            if(strtolower($tokens[0]) == 'servername'){
                $serverName = $tokens[1];
                ?><article class="<?php echo $style?>">
                <span class="image">
                    <img src="assets/images/<?php echo $pict;?>" alt="" />
                </span>
                <a target="_blank" href="http://<?php echo $serverName ?>">
                    <h5 ><?php echo $serverName?></h2>
                    <p class="siteType"> <?php echo $siteType ?></p>
                </a>
            </article><?php
            }
            
        }else{
            echo "Puked...";
        }
    }

fclose($Thisfile);


?>
</section>
</div>
</div></div>