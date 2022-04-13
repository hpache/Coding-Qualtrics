<!doctype html>
<html lang=en>

    <head>
    <meta charset="utf-8">
    <title>Codetrics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../scripts/js/nasa-script.js"></script>
    <link rel="stylesheet" href="../styles/css/bootstrap.min.css">
    </head>
    

    <form id="nasa-tlx">

        <div class="container">

            <div class="row">
                <div class="col">
                    <label for="mental" class="form-label">How much mental and perceptual activity was required? Was the task easy or demanding, simple or complex? </label> 
                    <label for="mental"  id="mental-val-out" style="color:red">0</label>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-sm">
                    0 (Low demand)
                </div>
                <div class="col-sm-10">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="mental">
                </div>
                <div class="col-sm">
                    100 (High demand)
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="physical" class="form-label">How much physical activity was required? Was the task easy or demanding, slack or strenuous? </label> 
                    <label for="physical"  id="physical-val-out" style="color:red">0</label>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    0 (Low demand)
                </div>
                <div class="col-sm-10">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="physical">
                </div>
                <div class="col-sm">
                    100 (High demand)
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="physical" class="form-label">How much time pressure did you feel due to the pace at which the tasks or task elements occurred? Was the pace slow or rapid? </label> 
                    <label for="physical"  id="time-val-out" style="color:red">0</label>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    0 (Low pace)
                </div>
                <div class="col-sm-10">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="time">
                </div>
                <div class="col-sm">
                    100 (High pace)
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="physical" class="form-label">How successful were you in performing the task? How satisfied were you with your performance? </label> 
                    <label for="physical"  id="success-val-out" style="color:red">0</label>
                </div>
            </div>
            

            <div class="row g-3">
                <div class="col-sm">
                    0 (Low performance)
                </div>
                <div class="col-sm-9">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="success">
                </div>
                <div class="col-sm">
                    100 (High performance)
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="physical" class="form-label">How hard did you have to work (mentally and physically) to accomplish your level of performance? </label> 
                    <label for="physical"  id="complex-val-out" style="color:red">0</label>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    0 (Low effort)
                </div>
                <div class="col-sm-10">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="complex">
                </div>
                <div class="col-sm">
                    100 (High effort)
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label for="physical" class="form-label">How irritated, stressed, and annoyed versus content, relaxed, and complacent did you feel during the task? </label> 
                    <label for="physical"  id="stress-val-out" style="color:red">0</label>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-sm">
                    0 (Low frustration)
                </div>
                <div class="col-sm-10">
                    <input type="range" class="form-range" value="50" min="0" max="100" step="10" id="stress">
                </div>
                <div class="col-sm">
                    100 (High frustration)
                </div>
            </div>
            
            <br>

            <div class="container">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> 
        
    </form>



</html>