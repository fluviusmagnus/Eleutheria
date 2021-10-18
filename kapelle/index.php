<html lang="zh-Hans">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="精神的房间, 祈祷, 忏悔, 树洞, 神龛, 寺庙, 参拜, 纪念, 吊唁"/>
    <meta name="description" content="人总是有着各自的精神寄托。有人求神拜佛，有人祈祷忏悔，也有人用漂流瓶来倾诉。这个文化中立的精神的房间提供一种私人祈祷有效性的象征。">
    <style type="text/css">
        body {
            max-width: 768px;
            margin: auto;
            text-align: center;
            font-family: serif;
            background-image: url("himmel.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100% 100%;
            background-clip: border-box;
        }

        h1 {
            font-size: 3em;
            color: white;
            text-shadow: 5px 5px 5px #000000;
        }

        footer {
            font-size: 0.8em;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
        }

        #hash {
            font-family: monospace;
            overflow-wrap: break-word;
            color: white;
            text-shadow: 1px 1px 1px #000000;

        }

        .weak {
            color: #b0b0b0;
        }

        .content {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            height: 360px;
            width: 70%;
        }
    </style>
    <title>精神的房间</title>
</head>

<body>
    <div class="content">
        <h1>精神的房间</h1>
        <p><?php
            $ispost = $_SERVER['REQUEST_METHOD'] == 'POST';
            $verfile = fopen("ver.txt", "r") or die("Unable to open file!");
            $ver = fread($verfile,filesize("ver.txt"));
            fclose($verfile);
            if ($ispost) {
                echo "您的思念已更新";
                // Update version number.
                $ver = $ver + 1;
                $verfile = fopen("ver.txt", "w") or die("Unable to open file!");
                fwrite($verfile, $ver);
                fclose($verfile);
            }
        ?>当前世界的状态：v<?php
                echo $ver;
        ?><br />
            <span id="hash"><?php 

$hashfile = fopen("hash.txt", "r") or die("Unable to open file!");
$hash = fread($hashfile,filesize("hash.txt"));
fclose($hashfile);

if ($ispost) {
    
    $hash = hash("sha512", $hash + $_POST["msg"]);
    $hashfile = fopen("hash.txt", "w") or die("Unable to open file!");
    fwrite($hashfile, $hash);
    fclose($hashfile);

}

echo $hash;

?></span>
        </p>
        <p></p>
        <form action="/kapelle/" id="msgform" method="post">
            <textarea name="msg" form="msgform" style="width: 70%; height: 5em;" placeholder="在此写下您的思念……"></textarea>
            <p><input type="submit" value="祈祷" /></p>
        </form>

    </div>
    <footer>
        <p class="text-tiny">© 2021 <a href="https://eleutheria.tech/">無限詩藝</a>. <a href="https://eleutheria.tech/archives/353/">关于此服务</a>.<br />
            <span class="weak">或许您终将意识到，我们不会收集任何数据.</span>
        </p>
    </footer>

</body>

</html>