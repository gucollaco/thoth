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
                        <a class="item" data-tab="coletanea">Coletânea</a>
                    </div>
                    <div class="ui bottom attached threaded comments segment p-expanded tab active" data-tab="comentarios">
                        
                        <div class="comment">
                            <div class="content">
                            <a class="author">Matt</a>
                            <div class="metadata">
                                <span class="comment-link" data-number="-1"><?='<<>>'?></span>
                            </div>
                            <div class="text">
                                How artistic!
                            </div>
                            <div class="actions">
                                <a class="remove-comment">Remover</a>
                            </div>
                            </div>
                        </div>
                    
                        <div class="ui clearing divider"></div>

                        <form class="ui reply form">
                            <div class="field">
                            <textarea></textarea>
                            </div>
                            <div class="ui red labeled submit icon button">
                            <i class="icon edit"></i> Adicionar comentário
                            </div>
                        </form>
                    </div>
                    <div class="ui bottom attached segment p-expanded tab" data-tab="criterios">
                    
                        <div class="ui input big fluid">
                            <input type="text" name="nota" placeholder="Nota Total">
                        </div>
                    
                        <div class="ui clearing divider"></div>

                        <div class="ui card fluid">
                            <div class="content">
                                <div class="header">Bom senso</div>
                                <div class="meta">
                                <span class="right floated criterio-nota-total">2.0</span>
                                </div>
                                <div class="description">
                                <p>I am also looking for an answer to this question, (to clarify, I want to be able to draw an image with user defined opacity such as how you can draw shapes with opacity) if you draw with primitive shapes you can set fill and stroke color with alpha to define the transparency.</p>
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="right floated author" style="width: 15%;">
                                    <div class="ui input fluid">
                                        <input type="text" name="parcial-1" placeholder="Nota">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui card fluid">
                            <div class="content">
                                <div class="header">Não seja um babaca</div>
                                <div class="meta">
                                <span class="right floated criterio-nota-total">1,5</span>
                                </div>
                                <div class="description">
                                <p>I am also looking for an answer to this question, (to clarify, I want to be able to draw an image with user defined opacity such as).</p>
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="right floated author" style="width: 15%;">
                                    <div class="ui input fluid">
                                        <input type="text" name="parcial-1" placeholder="Nota">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="ui clearing divider"></div>

                        
                        <form class="ui reply form">
                            <div class="field">
                                <div class="ui input ">
                                    <input type="text" name="criterio-nome" placeholder="Novo Critério">
                                </div>
                            </div>
                            <div class="field">
                                <textarea name="criterio-corpo"></textarea>
                            </div>
                            <div class="ui red labeled submit icon button">
                            <i class="icon edit"></i> Adicionar Critério
                            </div>
                        </form>

                    </div>
                    <div class="ui bottom attached segment p-expanded tab" data-tab="coletanea">
                        <button class="ui red button fluid">Baixar Coletânea</button>
                    </div>
                    
                    <div class="ui clearing divider"></div>

                    <button id="remove-highlight" class="ui black huge button fluid">Remover Highlight</button>
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
                        gridWidth="<?=$image_size?>"
                        id="<?=$idMesmo?>">
        <?php }
        } ?>
    </map>

    <div id="highlights" hidden>
        <highlight number="-1" />
    </div>