function validatePw(password, conf_password)
{
    if(password != conf_password) return "passwords does not match"

    return ""
}
function validateName(name)
{
    if(name=="") return "please enter the user name"
    
    return ""
}

function validatePhone(phone)
{
    if(phone=="") return "phone cannot be empty"
    else if (/[^0-9+/ ]/.test(field)) return "The Phone Number is invalid.\n\n"
	return ""
}
function validateDate(field) {
	if (field == "") return "Please enter a Date.\n\n"
	else if (/[^0-9.]/.test(field)) return "Date is invalid. Format must be: DD.MM.YYYY\n\n"
	else if (field.length != 10) return "Date is invalid. Format must be: DD.MM.YYYY\n\n"
	else if (!(field.indexOf(".") == 2)) return "Date is invalid. Format must be: DD.MM.YYYY\n\n"
	return ""
}
function validateEmail(field){
	if (field != ""){
		if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)) 
		{
		return "The Email address is invalid.\n\n"
		}
	}
	return ""
}