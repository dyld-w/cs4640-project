<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Nijat Khanbabayev and Dylan Dellett-Wion">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <title>Browse</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include 'navbar.html'?>

    <main class="flex-shrink-0">
        <!-- jumobtron thingy from https://getbootstrap.com/docs/5.0/examples/jumbotron/ -->
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Browse Workouts</h1>
                <p class="col-md-8 fs-4">
                    Here you can browse workouts people have posted, and even implement the workouts into
                    your own routine! Use the filters and/or the search bar to narrow the results.
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <!-- search bar from https://mdbootstrap.com/docs/standard/forms/search/ -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Desired Workout" aria-label="Desired Workout" aria-describedby="button-addon2" id = "search-input">
                        <button class="btn btn-outline-primary" type="button" id="search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2" style="border: 1px solid black">
                    <!-- column for the filter and selecters -->
                    <h3> Filters </h3>

                    <h4> Intensity </h4>
                    <!-- beginner check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Beginner
                        </label>
                    </div>
                    
                    <!-- intermediate check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Intermediate
                        </label>
                    </div>

                    <!-- advanced -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Advanced
                        </label>
                    </div>

                    <h4> Body Region </h4>
                    <!-- Upper check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Upper Body
                        </label>
                    </div>
                    
                    <!-- Lower check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Lower Body
                        </label>
                    </div>

                    <!-- Full -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                        Full Body
                        </label>
                    </div>

                    <h4> Goal </h4>
                    <!-- Lose Weight check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Lose Weight
                        </label>
                    </div>
                    
                    <!-- Get Stronger check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Get Stronger
                        </label>
                    </div>

                    <!-- Gain Muscle Mass -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Gain Muscle
                        </label>
                    </div>

                    <!-- Get Faster check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Get Faster
                        </label>
                    </div>
                    
                    <!-- Other check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Other
                        </label>
                    </div>
                </div>
                    

                <div class="col overflow-scroll" style="border: 1px solid black">
                    <!-- col for the results -->
                    <div class="container">
                        <!-- shows what we searched -->
                        <div class="row" style="border: 1px solid black" id = 'search_result'>
                        <p></p>
                        </div>
                        <!-- for each published exercise create one of the below "cards" -->
                        <div class="row" style="border: 1px solid black" id = 'get_big_fast_result'>
                            <button type="button" class="collapsible">Get Big Fast</button>
                            <div  class = 'content'>
                            <p>This is my scientifically sound 100% effective workout routine to get. Big. FAST! Follow for results. Guaranteed.</p>
                            <p><b>Tags:</b>Beginner, Upper Body, Gain Muscle Mass</p>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid black">
                            <button type="button" class="collapsible">Bicep Blaster</button>
                            <div class = 'content'>
                            <p>Some people consider lifting for biceps a vanity lift and completely impractical. 
                                Well they're wrong, and this is coming from the most handsome, least vane guy I know: Me. 
                                This plan is will DOUBLE the size of your biceps and therefore QUADRUPLE your quality of life, and that's a promise.</p>
                            <p><b>Tags:</b>Beginner, Upper Body, Gain Muscle Mass</p>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid black">
                            <button type="button" class="collapsible">Shoulders, Shoulders, Shoulders</button>
                            <div  class = 'content'>
                            <p>Be a good person. Provide your fellow human an ear to hear their woes and a shoulder to cry on... 
                                a nice rounded, muscular, comfy-lean-your-head-against kinda shoulder to cry on. This is the plan to get those shoulders, 
                                the shoulders that carry the weight of your burdens, overhead press a foal, and provide loving support to those around you.</p>
                            <p><b>Tags:</b>Beginner, Upper Body, Gain Muscle Mass</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- sticky footer from https://getbootstrap.com/docs/5.0/examples/sticky-footer/ -->
    <?php include 'footer.html' ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
    <script src="js/browse.js"></script>
</body>
</html>