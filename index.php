<!-- Team 6
Ryan Tanner
Robert Stewart
Guy Cockrum
Nick Morris
Cameron Keith
Chris Linstromberg 
  Custom Cupcakes -->


<?php

    session_start();
    $_SESSION['ID'] = $_POST['email'];
    echo $_SESSION['ID'];
    echo "Number = ". $_SESSION['email'];


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
  </head>

  <body>
    <form id="login" action = "index.php" method = "post">
        <div class="logEmail">
            <label>Email: </label>
            <input type="email" id="email" required placeholder="email@example.com" oninvalid="setCustomValidity('Please eneter a valid email address')" onchange="try{setCustomValidity('')}catch(e){}"/>
        </div>
        <div class="logPass"> 
            <label>Password: </label>
            <input type="password" id="logPass" name = "password" pattern = "[a-zA-Z0-9:.,?!@]{8,}" placeholder = "Password" oninvalid="setCustomValidity('Password must be greater than 8 characters')" onchange="try{setCustomValidity('')}catch(e){}" required/>
            <input type="submit" value="Login" id="signIn" /> 
        </div>
    </form>

    <div class="page">
    <img src="artwork/cupcake_icon.png" id = "logo" alt = "Custom Cupcake Logo">

    <div class="about site">    
        <p>Great Flavors!</p>
        <p>Awesome Cupcakes</p>
        <p>Fast Delivery</p>
    </div>



    <form id="register">
        <header>Create a Custome Cupcake Account</header>
        <div class="hr"><hr /></div>
    <ul>
        <li>
            <input type="radio" name="mailingList" value="Yes" checked> Yes
            <input type="radio" name="noMailingList" value="No"> No
        </li>
        <li>
            <input type="text" placeholder="First Name" id="firstName" required/>
            <input type="text" placeholder="Last Name" id="lastName" required/>
        </li>

        <li>
            <input type="email" placeholder="Email" id="email" oninvalid="setCustomValidity('Please eneter a valid email address')" onchange="try{setCustomValidity('')}catch(e){}" required/>
        </li>

        <li>
            <input type="password" id="password" name = "password" pattern = "[a-zA-Z0-9:.,?!@]{8,}" placeholder = "Password" oninvalid="setCustomValidity('Password must be greater than 8 characters')" onchange="try{setCustomValidity('')}catch(e){}" required/>
        </li>

        <li>
            <input type="text" placeholder="Telephone Number" id="phone" pattern = "[0-9]{10}" oninvalid="setCustomValidity('Phone number must be 10 characters, only numbers')" onchange="try{setCustomValidity('')}catch(e){}" required/>
        </li>

        <li>
            <input type="text" placeholder="Address" id="address" required/>
        </li>
            <input type="text" placeholder="City" id="city" required/>

        <li>
            <select>
                <option>Alabama</option>
                <option>Alaska</option>
                <option>Arizona</option>
                <option>Arkansas</option>
                <option>California</option>
                <option>Colorado</option>
                <option>Connecticut</option>
                <option>Delaware</option>
                <option>Florida</option>
                <option>Georgia</option>
                <option>Hawaii</option>
                <option>Idaho</option>
                <option>Illinois</option>
                <option>Indiana</option>
                <option>Iowa</option>
                <option>Kansas</option>
                <option>Kentucky</option>
                <option>Louisiana</option>
                <option>Maine</option>
                <option>Maryland</option>
                <option>Massachusetts</option>
                <option>Michigan</option>
                <option>Minnesota</option>
                <option>Mississippi</option>
                <option>Missouri</option>
                <option>Montana</option>
                <option>Nebraska</option>
                <option>Nevada</option>
                <option>New Hampshire</option>
                <option>New Jersey</option>
                <option>New Mexico</option>
                <option>New York</option>
                <option>North Carolina</option>
                <option>North Dakota</option>
                <option>Ohio</option>
                <option>Oklahoma</option>
                <option>Oregon</option>
                <option>Pennsylvania</option>
                <option>Rhode Island</option>
                <option>South Carolina</option>
                <option>South Dakota</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Utah</option>
                <option>Vermont</option>
                <option>Virginia</option>
                <option>Washington</option>
                <option>West Virginia</option>
                <option>Wisconsin</option>
                <option>Wyoming</option>
            </select>
        </li>

        <li>
            <input type="text" placeholder="Zipcode" id="zip" pattern = "[0-9]{5}" required/>
        </li>
    </ul>
            <input type="submit" value="Sign Up" id="signUp" />
  </form>
</div>
 
  </body>
</html>