<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <style>
    .q-box {
        border: 1px solid #333131c4;
        padding: 15px 20px;
        margin-bottom: 10px;
    }
    .quest,.quest span,.quest p{
        display:inline-block!important;
    }
    .card-content h6 {
        font-size: 15px;
    }

    mjx-container[jax="CHTML"][display="true"] {
        display: inline-block;
        text-align: left;
        margin: 1em 0;
    }
    </style>
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->

    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>
                    <div class="col m12 s12 l9">
                        <div class="row m0">
                            <div class="col l6 m6">
                                <p class="bold mb10 h6">Subject : <?php echo $subject->subject;?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('test/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> BACK</a>
                            </div>
                        </div>

                        <div class="card scrollspy">
                            <div class="card-content">
                                <div class="row">
                                    <?php if(!empty($question_row)){ $sn = ''; foreach($question_row as $keys=>$values){$sn++?>
                                    <div class="col s12 m12 l12 mt-20">

                                        <div class="mb-10">
                                            <span class="waves-effect waves-light btn blue darken-4 white-text  ">
                                                <b>Question <?php echo $sn;?> </b></span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<span
                                                class="waves-effect waves-light btn blue darken-1 white-text  "><b>Dificulty
                                                </b>: <?php echo $values->dificulty;?>
                                            </span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<span
                                                class="waves-effect waves-light btn blue darken-3 white-text  "><b>DUration
                                                </b>: <?php echo $values->duration;?>
                                            </span>
                                        </div>
                                        <div class="q-box">
                                            <div class="row">
                                                <?php if(!empty($questions)){ $count = 0; foreach($questions as $key=>$value){if($values->id ==$value->q_row_id ){ $count++; ?>
                                                <div class="col m12 s12 mb-10">
                                                    <b style="display: inline-block;"><span
                                                            class="ques">QN.<?php echo $sn.'.'.$count;?></span>
                                                        &nbsp;&nbsp;&nbsp;<span class="quest" style="display: inline-block;"><?php echo $value->question;?></span></b>
                                                </div>

                                                <?php if(!empty($value->question_img)) {
                                                    ?>
                                                <div class=" col s12 m12 l12">
                                                    <img class=" responsive-img"
                                                        src="<?php echo $this->config->item('web_url').$value->question_img;?>" />
                                                </div>
                                                <?php }?>
                                                <div class="col m12 s12">
                                                    <div class="row mb0">
                                                        <div class="col m6 s6 mb-10"><b>1.</b>
                                                            <?php echo $value->choice1;?> <img src="<?php echo (!empty($value->choice_img1))?$this->config->item('web_url').$value->choice_img1:'---';?>" alt=" "> </div>
                                                        <div class="col m6 s6 mb-10"><b>2.</b>
                                                            <?php echo $value->choice2;?> <img src="<?php echo (!empty($value->choice_img2))?$this->config->item('web_url').$value->choice_img2:'---';?>" alt=" "> </div>
                                                        <div class="col m6 s6 mb-10"><b>3.</b>
                                                            <?php echo $value->choice3;?> <img src="<?php echo (!empty($value->choice_img3))?$this->config->item('web_url').$value->choice_img3:'---';?>" alt=" "> </div>
                                                        <div class="col m6 s6 mb-10"><b>4.</b>
                                                            <?php echo $value->choice4;?> <img src="<?php echo (!empty($value->choice_img4))?$this->config->item('web_url').$value->choice_img4:'---';?>" alt=" "> </div>
                                                        <div class="col m12 s12">
                                                            <div class="row mb0 ">
                                                                <div class="col m6 s6 py-10">
                                                                    <p class=" ans ">
                                                                        Ans :
                                                                        <strong><?php echo $value->correct;?></strong>
                                                                    </p>
                                                                </div>
                                                                <div class="col m6 s6 right-align py-10"> <a 
                                                                        href="<?php echo base_url('test/edit-question/'.$value->id) ?>"
                                                                        class="waves-effect waves-light btn white-text  green darken-4 hoverable" style="border-radius: 0;"><i
                                                                            class="fas fa-edit mr10"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col m12 s12 py-10"><div class="divider"></div> </div>

                                                <?php }}};?>
                                            </div>
                                        </div>

                                    </div>
                                    <?php }};?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>









    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js">
    </script>



</body>

</html>