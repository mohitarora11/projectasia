<?php
$_videoid = 'ZbvDVuPr9yc';
$_type = 'arshad';
if($_SERVER["REQUEST_METHOD"] == "GET")
 { 
    if (!empty($_REQUEST["type"])){
        switch($_REQUEST["type"]){
            case 'arshad':
                $_videoid = 'ZbvDVuPr9yc';
                $_type = 'arshad';
                break;
            
            case 'torun':
                $_videoid = 'OFe4HswpSJg';  
                $_type = 'torun'; 
                break;     

            case 'ob':
                $_videoid = 'AuHqTSPmAb8';
                $_type = 'ob';
                break;    
        }
    }
}
?>    
<!DOCTYPE html>
<html>

<head>
    <title>Global Business Art</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection" />
    <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />-->
    <link type="text/css" rel="stylesheet" href="css/main.css?bpc=1" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body class="green lighten-4">

    <!--Import jQuery before materialize.js-->
    <div class="container">
        <div class="row" id="videowrapper">
            <div class="col s12">
                <div class="card">
                    <div  class="videowrapper">
                        <div id="player"></div>
                    </div>
                    <script src="http://www.youtube.com/player_api"></script>
                    <script>
                    // create youtube player
                    var player;

                    function onYouTubePlayerAPIReady() {
                        player = new YT.Player('player', {
                            height: 'auto',
                            videoId: '<?php echo $_videoid?>',
                            playerVars: {
                                'autoplay': 1
                            },    
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    };
                    // autoplay video
                    function onPlayerReady(event) {
                        event.target.playVideo();
                    };
                    // when video ends
                    function onPlayerStateChange(event) {
                        if (event.data === 0) {
                            document.getElementById('id_row_form').style.opacity = '1';
                            document.getElementById('videowrapper').style.display = 'none';
                        }
                    }
                    </script>
                </div>
            </div>
        </div>
        <div class="row" id="id_row_form">
            <form class="col s12" id="id_form" method="post">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title black-text">Sign In</span>
                        <div class="row">
                            <div class="input-field col s12">
                                <input pattern="[a-zA-Z][a-zA-Z ]{1,}" required name="fName" id="first_name" type="text" class="validate">
                                <label for="first_name">Name*</label>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input required id="email" type="email" name="email" class="validate">
                                <label for="email">Email*</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input pattern="^\d{10}$" id="mobile" name="mobile" type="text" class="validate">
                                <label for="mobile">Mobile</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <input type="hidden" name="type" value="<?php echo $_type?>">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                                <a style="margin-left: 10px" class="waves-effect waves-light" href="#<?php echo $_type?>">About Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row" id="id_row_thanks">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title black-text">Thank you<span id="id_msg"></span></span><br/>
                        <img id="id_aboutme_img" style="width:100%" src="" data-src="images/<?php echo $_type?>.jpg?bpc=1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="arshad" class="modal">
        <div class="modal-content">
          <h4>About Me</h4>
          <p>IMAGINE ALL THE OPPORTUNITIES WE PASS BY EVERY DAY TO HAVE THE DREAM LIFE <br/>
            For the past 39 years, we have been working to help ordinary people to develop an extraordinary life, by showing them the secrets to build a successful home base business using our concept. The result is that today we are instrumental in developing the success of tens of thousands of home based small businesses in more than 150 countries.<br/>
            We are looking for:
            <ul>
                <li>A people's person</li>
                <li>People who can work independently</li>
                <li>People who are self-motivated</li>
                <li>Sales and management experience is not necessary but a plus</li>
                <li>A positive attitude</li>
                <li>Open to new ways of thinking</li>
                <li>A team player</li>
            </ul>
            Responsibilities:
            <ul>
                <li>Sales of popular everyday health, beauty and nutrition products</li>
                <li>Teambuilding and cooperation with other business owners</li>
                <li>Recruiting new exciting business owners</li>
                <li>Coaching </li>
                <li>Structuring and planning</li>
            </ul>
            We offer:
            <ul>
                <li>High income opportunities</li>
                <li>Opportunity to take part in corporate profits being handed out once a year</li>
                <li>Opportunity to travel the world</li>
                <li>Opportunity to get a free car</li>
                <li>Personal development</li>
                <li>Education In management and coaching</li>
                <li>Insight into the health, wellness and nutritional supplements industry</li>
                <li>Coaching and active assistance to achieve your goals</li>
                <li>Much more</li>
            </ul>
        </p>
        </div>
        <div class="modal-footer"></div>
      </div>
      <div id="torun" class="modal">
        <div class="modal-content">
          <h4>About Me</h4>
          <p>For the past 39 years, we have been working to help ordinary people to develop an extraordinary life, by showing them the secrets to build a successful home base business using our concept. The result is that today we are instrumental in developing the success of tens of thousands of home based small businesses in more than 150 countries.<br/>
            We are looking for:
            <ul>
                <li>A people's person</li>
                <li>People who can work independently</li>
                <li>People who are self-motivated</li>
                <li>Sales and management experience is not necessary but a plus</li>
                <li>A positive attitude</li>
                <li>Open to new ways of thinking</li>
                <li>A team player</li>
            </ul>
            Responsibilities:
            <ul>
                <li>Sales of popular everyday health, beauty and nutrition products</li>
                <li>Teambuilding and cooperation with other business owners</li>
                <li>Recruiting new exciting business owners</li>
                <li>Coaching </li>
                <li>Structuring and planning</li>
            </ul>
            We offer:
            <ul>
                <li>High income opportunities
                <li>Opportunity to take part in corporate profits being handed out once a year</li>
                <li>Opportunity to travel the world</li>
                <li>Opportunity to get a free car</li>
                <li>Personal development</li>
                <li>Education In management and coaching</li>
                <li>Insight into the health, wellness and nutritional supplements industry</li>
                <li>Coaching and active assistance to achieve your goals</li>
                <li>Traveling</li>
                <li>Much more</li>
            </ul>

        </p>
        </div>
        <div class="modal-footer"></div>
      </div>
      <div id="ob" class="modal">
        <div class="modal-content">
          <h4>About Me</h4>
          <p>For the past 39 years, we have been working to help ordinary people to develop an extraordinary life, by showing them the secrets to build a successful home base business using our concept. The result is that today we are instrumental in developing the success of tens of thousands of home based small businesses in more than 150 countries.
        <br/>
        We are looking for:
        <ul>
            <li>A people's person</li>
            <li>People who can work independently</li>
            <li>People who are self-motivated</li>
            <li>Sales and management experience is not necessary but a plus</li>
            <li>A positive attitude</li>
            <li>Open to new ways of thinking</li>
            <li>A team player</li>
        </ul>    
        Responsibilities:
        <ul>
            <li>Sales of popular everyday health, beauty and nutrition products</li>
            <li>Teambuilding and cooperation with other business owners</li>
            <li>Recruiting new exciting business owners</li>
            <li>Coaching </li>
            <li>Structuring and planning</li>
        </ul>
        We offer:
        <ul>
            <li>High income opportunities</li>
            <li>Opportunity to take part in corporate profits being handed out once a year</li>
            <li>Opportunity to travel the world</li>
            <li>Opportunity to get a free car</li>
            <li>Personal development</li>
            <li>Education In management and coaching</li>
            <li>Insight into the health, wellness and nutritional supplements industry</li>
            <li>Coaching and active assistance to achieve your goals</li>
            <li>Traveling</li>
            <li>Much more</li>
         </ul>
        </p>
        </div>
        <div class="modal-footer"></div>
      </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!--<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>-->
    <script type="text/javascript">
        $('#id_form').submit(function(e) {
            e.preventDefault();
            $('#id_aboutme_img').attr('src',$('#id_aboutme_img').data('src'));
            $.ajax({
              url: "server/lead.php?id=save",
              data: $('#id_form').serialize()
            }).done(function(r) {
                if(r.res) {

                } else {
                    if(typeof r["error"] != undefined) {
                        r["error"]["errorInfo"].forEach(function(item,index){
                            if(String(item).indexOf('Duplicate entry') > -1){
                                $('#id_msg').html(", you have already registered with us.");    
                            };
                        })
                    }
                }
                document.getElementById('id_row_thanks').style.opacity = '1';
                document.getElementById('id_row_form').style.display = 'none';
            });
        });
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });

    </script>
</body>

</html>
