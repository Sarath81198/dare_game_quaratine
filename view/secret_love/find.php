<?php
require_once '../layout/header.php';
?>
<style>
    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        border: 1px solid #aaaaaa;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }


    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4272f5;
    }
</style>
<div class="container">
    <div class="form-group">
        <form id="regForm" method="POST" onSubmit="disableSubmitBtn();" action="../../secret_love/result.php">
            <h3 class="text-primary" style="text-align: center; margin-bottom:70px"><b>Find out who loves you secretly</b></h3>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-bottom:50px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">Enter your name:</div>
                </b>
                <input type="text" name="name" class="form-control" id="nameGiven" placeholder="Enter your name ..." required>

            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">How would you describe yourself in one word ?</div>
                </b>
                <select id="quesOne" class="custom-select" onChange="enableNextBtn();" name="ques_one" size="4" required>
                    <option value="1">Hardworking</option>
                    <option value="2">Modesty</option>
                    <option value="3">Loyal</option>
                    <option value="4">Adventurous</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        Where do you spend most of your time ?
                    </div>
                </b>
                <select id="quesTwo" class="custom-select" onChange="enableNextBtn();" name="ques_two" size="4" required>
                    <option value="1">At home</option>
                    <option value="2">Hanging around at town</option>
                    <option value="3">At friend's house</option>
                    <option value="4">At school or work</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        If you were in a jam, who would you call first ?
                    </div>
                </b>
                <select id="quesThree" name="ques_three" onChange="enableNextBtn();" class="custom-select" size="4" required>
                    <option value="1">Family Member</option>
                    <option value="2">A good friend</option>
                    <option value="3">Anyone nearby</option>
                    <option value="4">A neighbour</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        Which season is your favorite ?
                    </div>
                </b>
                <select id="quesFour" name="ques_four" onChange="enableNextBtn();" class="custom-select" size="4" required>
                    <option value="1">Winter</option>
                    <option value="2">Spring</option>
                    <option value="3">Summer</option>
                    <option value="4">Fall</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        If you have free time in your hands, you will most likely
                    </div>
                </b>
                <select id="quesFive" name="ques_five" onChange="enableNextBtn();" class="custom-select" size="4" required>
                    <option value="1">Studying</option>
                    <option value="2">Shopping</option>
                    <option value="3">Singing</option>
                    <option value="4">Doing something else</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        What's your idea of a perfect date ?
                    </div>
                </b>
                <select id="quesSix" name="ques_six" onChange="enableNextBtn();" class="custom-select" size="4" required>
                    <option value="1">Going to movies</option>
                    <option value="2">Chatting over a cup of coffee</option>
                    <option value="3">A romantic dinner</option>
                    <option value="4">Meeting at a bar</option>
                </select>
            </div>
            <div class="tab">
                <b>
                    <div style="margin-bottom:50px" class="text-info">
                        Whom do you spend your most of the time with ?
                    </div>
                </b>
                <select id="quesSeven" name="ques_seven" onChange="enableNextBtn();" class="custom-select" size="4" required>
                    <option value="1">Co-workers</option>
                    <option value="2">Friends</option>
                    <option value="3">Family</option>
                    <option value="4">Stranger</option>
                </select>
            </div>
            <div style="overflow:auto;">
                <center style="margin-top:50px">
                    <button type="button" id="prevBtn" class="btn btn-warning" onClick="window.location.reload()">Reset</button>
                    <!-- <button type="button" id="prevBtn" class="btn btn-info" onclick="nextPrev(-1)">Previous</button> -->
                    <button type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)">Next</button>
                </center>
            </div>
        </form>
    </div>
</div>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function disableSubmitBtn() {
        document.getElementById("nextBtn").disbled = true;
    }

    function enableNextBtn() {
        document.getElementById("nextBtn").disabled = false;
    }

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        name = document.getElementById("nameGiven").value

        if (n == -1) {
            enableNextBtn();
        }

        if (n == 1 && name == "") {
            window.alert("Enter your name")
        } else {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);

        }
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
            document.getElementById("nextBtn").disabled = true;
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
<?php
require_once '../layout/footer.php';
?>