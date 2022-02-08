<?php include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        
        <?=link_tag('assets/assets/plugins/datatables/css/dataTables.min.css');?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

    <link href="<?=base_url('assets/');?>assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/>   
</head>
<body>
   <!--  <div class="bgcolor">
        <label class="demo-label">Search Country:</label><br/> <input type="text" name="txtCountry" id="typeahead-3" class="typeahead"/>
    </div> -->

            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
  <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <section class="box ">
                                <header class="panel_header">
                                    <h2 class="title float-left">Typeahead / Auto Complete / Suggestion</h2>
                                    <div class="actions panel_actions float-right">
                                        <i class="box_toggle fa fa-chevron-down"></i>
                                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                        <i class="box_close fa fa-times"></i>
                                    </div>
                                </header>
                                <div class="content-body">    
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">

                                             <div class="form-group">
                                                <label class="form-label">Remote data Example</label> 
                                                <div class="input-group">

                                                    <input type="text" class="form-control" placeholder="Type for Suggestions" id="typeahead-3" style="width: 100%;">
                                                </div>   
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12">

                                             <div class="form-group">
                                                <label class="form-label">Remote data Example</label> 
                                                <div class="input-group">

                                                    <input type="text" class="form-control" placeholder="Type for Suggestions" id="typeahead-4" style="width: 100%;">
                                                </div>   
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </section></div>
                        </section>
                        </section>
<?php include "includes/footer.php";?>      
 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script type="text/javascript" language="javascript" src="<?=base_url('assets/');?>assets/plugins/datatables/js/datatables.min.js"></script> 
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> 
        <script src="<?=base_url('assets/');?>assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        
        <!-- CORE TEMPLATE JS - START --> 
        <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 




    </body>
</html>
<script  type="text/javascript" >
    $(document).ready(function () {
         var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({
                                value: str
                            });
                        }
                    });

                    cb(matches);
                };
            };

         // remote data


            var name_randomizer = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: 'Testpages/GetCountryName/%QUERY'
            });

            name_randomizer.initialize();

            $('#typeahead-3').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'value',
                source: name_randomizer.ttAdapter()
            });



            // remote data


            var GetAccounthead = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: 'Testpages/GetAccounthead/%QUERY'
            });

            GetAccounthead.initialize();

            $('#typeahead-4').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'value',
                source: GetAccounthead.ttAdapter()
            });


        
    });
</script>