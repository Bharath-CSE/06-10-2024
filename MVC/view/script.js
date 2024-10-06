function validateFirstName() 
{
    const fname=document.getElementById("fname").value;
    const fnameError=document.getElementById("fnameError");
    if (fname.trim()=="" || fname.trim()==null) 
    {
        fnameError.textContent="First name must be filled out";
        return false;
    }
    else 
    {
        fnameError.textContent="";
        return true;
    }
}

function validateLastName() 
{
    const lname=document.getElementById("lname").value;
    const lnameError=document.getElementById("lnameError");
    if (lname.trim()=="" || lname.trim()==null) 
    {
        lnameError.textContent="Last name must be filled out";
        return false;
    }
    else 
    {
        lnameError.textContent="";
        return true;
    }
}

function validateDOB() 
{
    const dob=document.getElementById("dob").value;
    const dobError=document.getElementById("dobError");
    if (dob.trim()=="" || dob.trim()==null) 
    {
        dobError.textContent="DOB must be filled out";
        return false;
    }
    else 
    {
        dobError.textContent="";
        return true;
    }
}

function validateEmail() 
{
    const email=document.getElementById("email").value;
    const emailError=document.getElementById("emailError");
    if (email.trim()=="" || email.trim()==null) 
    {
        emailError.textContent="Email must be filled out";
        return false;
    }
    const emailPattern = /^[^@]+@[^@]+\.[^@]+$/;
    if(!emailPattern.test(email.trim()))
    {
        emailError.textContent = "Invalid Email format";
        return false;
    }
    else 
    {
        emailError.textContent="";
        return true;
    }
}

function validateNumber() 
{
    const number=document.getElementById("number").value;
    const numberError=document.getElementById("numberError");
    if (number.trim()=="" || number.trim()==null) 
    {
        numberError.textContent="Number must be filled out";
        return false;
    }
    if((number.trim()>='a' && number.trim()<='z') || (number.trim()>='A' && number.trim()<='Z'))
    {
        numberError.textContent="Number does not contains letters";
        return false;
    }
    if((number.trim().length)!=10)
    {
        numberError.textContent="Number contains 10 digits";
        return false;
    }
    else 
    {
        numberError.textContent="";
        return true;
    }
}

function validateImage() 
{
    const image=document.getElementById("image").value;
    console.log(image);
    const imageError=document.getElementById("imageError");
    if (image.trim()=="" || image.trim()==null) 
    {
        imageError.textContent="Image must be upload";
        return false;
    }
    const extension=[".jpg",".jpeg",".png"];
    if(!extension.some(el => (image.trim()).endsWith(el)))
    {
        imageError.textContent="Image only upload";
        return false;
    }
    else 
    {
        imageError.textContent="";
        return true;
    }
}

function validateDepartment() 
{
    const department=document.getElementById("department").value;
    const departmentError=document.getElementById("departmentError");
    if (department.trim()=="" || department.trim()==null) 
    {
        departmentError.textContent="Department must be filled out";
        return false;
    }
    else 
    {
        departmentError.textContent="";
        return true;
    }
}   

function validateAge() 
{
    const age=document.getElementById("age").value;
    const ageError=document.getElementById("ageError");
    if (age.trim()=="" || age.trim()==null) 
    {
        ageError.textContent="Age must be filled out";
        return false;
    }
    else 
    {
        ageError.textContent="";
        return true;
    }
}

function validateBloodGroup() 
{
    const blood_group=document.getElementById("blood_group").value;
    const blood_group_Error=document.getElementById("blood_group_Error");
    if (blood_group.trim()=="" || blood_group.trim()==null) 
    {
        blood_group_Error.textContent="Blood Group must be filled out";
        return false;
    }
    else 
    {
        blood_group_Error.textContent="";
        return true;
    }
}

function validateGender() 
{
    const gender=document.getElementById("gender").value;
    const genderError=document.getElementById("genderError");
    if (gender.trim()=="" || gender.trim()==null) 
    {
        genderError.textContent="Gender must be filled out";
        return false;
    }
    else 
    {
        genderError.textContent="";
        return true;
    }
}

function validatePassedoutYear() 
{
    const passedout_year=document.getElementById("passedout_year").value;
    const passedout_year_Error=document.getElementById("passedout_year_Error");
    if (passedout_year.trim()=="" || passedout_year.trim()==null) 
    {
        passedout_year_Error.textContent="Passedout Year must be filled out";
        return false;
    }
    else 
    {
        passedout_year_Error.textContent="";
        return true;
    }
}

function validateLocation() 
{
    const location=document.getElementById("location").value;
    const locationError=document.getElementById("locationError");
    if (location.trim()=="" || location.trim()==null) 
    {
        locationError.textContent="Location must be filled out";
        return false;
    }
    else 
    {
        locationError.textContent="";
        return true;
    }
}

// document.getElementById("submit").disabled = true;

document.addEventListener("DOMContentLoaded", function() 
{
    document.getElementById("fname").addEventListener("focusout", validateFirstName);
    document.getElementById("lname").addEventListener("focusout", validateLastName);
    document.getElementById("dob").addEventListener("focusout", validateDOB);
    document.getElementById("email").addEventListener("focusout", validateEmail);
    document.getElementById("number").addEventListener("focusout", validateNumber);
    document.getElementById("image").addEventListener("focusout", validateImage);
    document.getElementById("department").addEventListener("focusout", validateDepartment);
    document.getElementById("age").addEventListener("focusout", validateAge);
    document.getElementById("blood_group").addEventListener("focusout", validateBloodGroup);
    document.getElementById("gender").addEventListener("focusout", validateGender);
    document.getElementById("passedout_year").addEventListener("focusout", validatePassedoutYear);
    document.getElementById("location").addEventListener("focusout", validateLocation);
});

function validateForm() 
{
    const isFNameValid = validateFirstName();
    const isLNameValid = validateLastName();
    const isDOBValid = validateLastName();
    const isEmailValid = validateEmail();
    const isNumberValid = validateNumber();
    const isImageValid = validateImage();
    const isDepartmentValid = validateDepartment();
    const isAgeValid = validateAge();
    const isBloodGroupValid = validateBloodGroup();
    const isGenderValid = validateGender();
    const isPassedOutYearValid = validatePassedoutYear();
    const isLocationValid = validateLocation();

    if (isFNameValid && isLNameValid && isDOBValid && isEmailValid && isNumberValid && isImageValid && isDepartmentValid && isAgeValid && isBloodGroupValid && isGenderValid && isPassedOutYearValid && isLocationValid) 
    {
        document.getElementById("submit").disabled=false;
        alert("Successfully Created");
    }
}

//loginValidation

function validateUsername() 
{
    const username=document.getElementById("username").value;
    const usernameError=document.getElementById("usernameError");
    if (username.trim()=="" || username.trim()==null) 
    {
        usernameError.textContent="Username must be filled out";
        return false;
    }
    else 
    {
        usernameError.textContent="";
        return true;
    }
}

function validatePassword() 
{
    const password=document.getElementById("password").value;
    const passwordError=document.getElementById("passwordError");
    if (password.trim()=="" || password.trim()==null) 
    {
        passwordError.textContent="Password must be filled out";
        return false;
    }
    else 
    {
        passwordError.textContent="";
        return true;
    }
}

document.addEventListener("DOMContentLoaded", function() 
{
    document.getElementById("username").addEventListener("focusout", validateUsername);
    document.getElementById("password").addEventListener("focusout", validatePassword);
});

function validateLogin()
{
    const isUsernameValid = validateUsername();
    const isPasswordValid = validatePassword();

    if(isUsernameValid && isPasswordValid)
    {
        return true;
    }
}