<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thoth - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/entregar_aluno.css">
    <link rel="stylesheet" type="text/css" href="css/image-map-highlighter.css">

</head>
<body>
	<div class="container-body">
        <div class="ui segment grid segment-body">
            <div class="ten wide column">
                <div class="essay-holder">
                    <img class="ui fluid image essay" src="images/essay_model.jpg" usemap="#map">
                </div>
            </div>
            <div class="six wide column">
                <div class="comments-holder">
                    <div class="ui top attached tabular menu">
                        <a class="active item" data-tab="comentarios">Comentários</a>
                        <a class="item" data-tab="criterios">Critérios</a>
                    </div>
                    <div class="ui bottom attached threaded comments segment p-expanded tab active" data-tab="comentarios">
                        
                        <div class="comment">
                            <a class="avatar">
                                <img src="images/image.png">
                            </a>
                            <div class="content">
                            <a class="author">Matt</a>
                            <div class="metadata">
                                <span class="date">Today at 5:42PM</span>
                            </div>
                            <div class="text">
                                How artistic!
                            </div>
                            <div class="actions">
                                <a class="reply">Reply</a>
                            </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                            <img src="images/image.png">
                            </a>
                            <div class="content">
                            <a class="author">Elliot Fu</a>
                            <div class="metadata">
                                <span class="date">Yesterday at 12:30AM</span>
                            </div>
                            <div class="text">
                                <p>This has been very useful for my research. Thanks as well!</p>
                            </div>
                            <div class="actions">
                                <a class="reply">Reply</a>
                            </div>
                            </div>
                            <div class="comments">
                            <div class="comment">
                                <a class="avatar">
                                    <img src="images/image.png">
                                </a>
                                <div class="content">
                                <a class="author">Jenny Hess</a>
                                <div class="metadata">
                                    <span class="date">Just now</span>
                                </div>
                                <div class="text">
                                    Elliot you are always so right :)
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                            <img src="images/image.png">
                            </a>
                            <div class="content">
                            <a class="author">Joe Henderson</a>
                            <div class="metadata">
                                <span class="date">5 days ago</span>
                            </div>
                            <div class="text">
                                Dude, this is awesome. Thanks so much
                            </div>
                            <div class="actions">
                                <a class="reply">Reply</a>
                            </div>
                            </div>
                        </div>
                        <form class="ui reply form">
                            <div class="field">
                            <textarea></textarea>
                            </div>
                            <div class="ui blue labeled submit icon button">
                            <i class="icon edit"></i> Add Reply
                            </div>
                        </form>
                    </div>
                    <div class="ui bottom attached segment p-expanded tab" data-tab="criterios">
                        COISAS
                    </div>
                </div>
            </div>
        </div>
    </div>	

    <map name="map">
        <?php 
        $image_height = 1112;
        $image_size = 908;
        $cell_size = 30;
        for ($j = 0; $j <= $image_height - $cell_size; $j += $cell_size){
            for($i = 0; $i <= $image_size - $cell_size; $i+= $cell_size){ 
                $id = $i.','.$j;
                $idMesmo = "area".$id;
                ?>
                <area href="#" shape="rect" 
                        coords="<?=$i?>,<?=$j?>,<?=$i + $cell_size?>,<?=$j + $cell_size?>" 
                        gridId="<?=$id?>" 
                        gridSize="<?=$cell_size?>"
                        gridHeight="<?=$image_height?>" 
                        gridWidth="<?=$image_size?>"
                        id="<?=$idMesmo?>">
        <?php }
        } ?>
    </map>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="semantic/dist/semantic.min.js"></script>

    <script src="js/home_aluno.js"></script>
    <script src="js/image-map-highlighter.js"></script>
    <script src="js/entregar_aluno.js"></script>
</body>
</html>