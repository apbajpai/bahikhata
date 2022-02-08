
var whitespace = " \t\n\r";
var defaultEmptyOK = true;

  function IsTime(strTime)
  {
    var strTestTime = new String(strTime);
    strTestTime.toUpperCase();

    var bolTime = false;

    if (strTestTime.indexOf("PM",1) != -1 || strTestTime.indexOf("AM",1))
      bolTime = true;

    if (bolTime && strTestTime.indexOf(":",0) == 0)
      bolTime = false;

    var nColonPlace = strTestTime.indexOf(":",1);
    if (bolTime && ((parseInt(nColonPlace) + 5) < (strTestTime.length - 1) || (parseInt(nColonPlace) + 4) > (strTestTime.length - 1)))
      bolTime = false;


    return bolTime;
  }

/****************************************************************/

function replaceAll (s, fromStr, toStr)
{
  var new_s = s;
  for (i = 0; i < 100 && new_s.indexOf (fromStr) != -1; i++)
  {
    new_s = new_s.replace (fromStr, toStr);
  }
  return new_s;
}

/****************************************************************/

/* PURPOSE:  Since we are using the single tick mark as the
  string delimiter to construct our SQL queries, a string with
  a tick mark in it will cause a SQL error.  Therefore we replace
  all "'" with "''", which eliminates the possibility of a SQL error.
*/

function sqlSafe (s)
{
  var new_s = s;
  new_s = replaceAll (new_s, "'", "|");
  new_s = replaceAll (new_s, "|", "''");
  new_s = replaceAll (new_s, "\"", "|");
  new_s = replaceAll (new_s, "|", "''");
  return new_s;
}

/****************************************************************/

function makeSafe (i)
{
  i.value = sqlSafe (i.value);
}

/****************************************************************/

// Check whether string s is empty.

function isEmpty(s)
{   return ((s == null) || (s.length == 0))
}

/****************************************************************/

// Returns true if string s is empty or 
// whitespace characters only.

function isWhitespace (s)

{   var i;

    // Is s empty?
    if (isEmpty(s)) return true;

    // Search through string's characters one by one
    // until we find a non-whitespace character.
    // When we do, return false; if we don't, return true.
  if(s=='0') return true;
  
    for (i = 0; i < s.length; i++)
    {   
  // Check that current character isn't whitespace.
  var c = s.charAt(i);

  if (whitespace.indexOf(c) == -1) return false;
    }

    // All characters are whitespace.
    return true;
}

/****************************************************************/

// isEmail (STRING s [, BOOLEAN emptyOK])
// 
// Email address must be of form a@b.c ... in other words:
// * there must be at least one character before the @
// * there must be at least one character before and after the .
// * the characters @ and . are both required
//
// For explanation of optional argument emptyOK,
// see comments of function isInteger.

function isEmail (s)
{  
  if (isEmpty(s)) 
        if (isEmail.arguments.length == 1) return defaultEmptyOK;
        else return (isEmail.arguments[1] == true);
   
    // is s whitespace?
    if (isWhitespace(s)) return false;
    
    // there must be >= 1 character before @, so we
    // start looking at character position 1 
    // (i.e. second character)
    var i = 1;
    var sLength = s.length;

    // look for @
    while ((i < sLength) && (s.charAt(i) != "@"))
    { i++
    }

    if ((i >= sLength) || (s.charAt(i) != "@")) return false;
    else i += 2;

    // look for .
    while ((i < sLength) && (s.charAt(i) != "."))
    { i++
    }

    // there must be at least one character after the .
    if ((i >= sLength - 1) || (s.charAt(i) != ".")) return false;
    else return true;
}


function ForceEmail(objField){
  var strField = new String(objField.value);
  if (!isEmail(strField)) {
    alert("Please enter a valid E-Mail address");
    objField.focus();
    objField.select();
    return false;
  }
  return true;
}


/****************************************************************/

// Checks to see if a required field is blank.  If it is, a warning
// message is displayed...
function ForceSelect(objField, FieldName)
{
if (objField.selectedIndex==0) {
    alert("Please select \"" + FieldName+ "\".");
    objField.focus();
    return false;
  }
  return true;
}

function ForceEntry(objField, FieldName)
{
  var strField = new String(objField.value);
  if (isWhitespace(strField)) {
    alert("You need to enter information for \"" + FieldName + "\".");
    objField.focus();
    objField.select();
    return false;
  }

  return true;
}

function ForceEditor(objField, FieldName)
{
  //alert("Me In Function");
  var strField = new String(objField.value);
  if (isWhitespace(strField)) {
    alert("You need to enter information for \"" + FieldName + "\".");
    return false;
  }

  return true;
}
    
    
/****************************************************************/

// Returns true if the string passed in is a valid number
//  (no alpha characters), else it displays an error message

function ForceNumber(objField, FieldName)
{
  var strField = new String(objField.value);
  
  if (isWhitespace(strField)) return true;

  var i = 0;

  for (i = 0; i < strField.length; i++)
    if (strField.charAt(i) < '0' || strField.charAt(i) > '9') {
      alert("\"" +FieldName + "\" must be a valid numeric entry.");
      objField.focus();
      objField.select()
      return false;
    }

  return true;
}

/****************************************************************/

// Returns true if the string passed in is a valid number
//  (including /- ,), else it displays an error message

function ForcePhoneNumber(objField, FieldName)
{
  var strField = new String(objField.value);
  
  if (isWhitespace(strField)) return true;

  var i = 0;

  for (i = 0; i < strField.length; i++)
  {
    c = strField.charAt(i);
    var flag = (c >= '0' && c <= '9') || (c=="/") || (c=="-") || (c==",") || (c==" ") || (c=="+") 
    if (!flag) {
      alert("\"" + FieldName + "\" must be only in numeric format.");
      objField.focus();
      objField.select();
      return false;
    }
  }
  return true;
}




/****************************************************************/
//By Saurabh Tripathi 30/09/2006
// Returns true if the string passed in is a valid number
//  (including /- ,), else it displays an error message

function ForceMobileNumber(objField, FieldName)
{
  var strField = new String(objField.value);
  
  if (isWhitespace(strField)) return true;

  var i = 0;

  for (i = 0; i < strField.length; i++)
  {
    c = strField.charAt(i);
    var flag = (c >= '0' && c <= '9') || (c==" ") || (c=="+") || (c=="-") 
    if (!flag) {
      alert("\"" + FieldName + "\" must be only in numeric format.");
      objField.focus();
      objField.select();
      return false;
    }
  }
  return true;
}






/****************************************************************/

// Returns true if the string passed in is a valid money
//  (no alpha characters except a decimal place), 
//   else it displays an error message

function ForceMoney(objField, FieldName)
{
  var strField = new String(objField.value);
  
  if (isWhitespace(strField)) return true;

  var i = 0;

  for (i = 0; i < strField.length; i++)
    if ((strField.charAt(i) < '0' || strField.charAt(i) > '9') && (strField.charAt(i) != '.')) {
      alert("\"" + FieldName + "\" must be a valid numeric entry.  Please do not use commas or dollar signs or any non-numeric symbols.");
      objField.focus();
      return false;
    }

  return true;
}


/****************************************************************/

// Right trims the string...  Useful for SQL datatypes of CHAR

function RTrim(strTrim)
{
  var str = new String(strTrim);
  var i = 0;
  var c = "";
  var endpos = 0

  for (i = str.length; i >= 0 && endpos == 0; i = i - 1) {
    c = str.charAt(i);
    if (whitespace.indexOf(c) == -1)
      endpos = i;
  }

  return str.substring(0,endpos+1);
}

/****************************************************************/

/* PURPOSE:  Returns true if the string is a valid date number.
  A method is passed in (1 = month, 2 = day).  If the string is
  nonnumeric, false is passed back.  If the day in the date string
  is greater than 31, false is returned.  If the month is greater
  than 12, an error is returned.
*/

function isDateNumber(strNum,method)
{
  var str = new String(strNum);
  var i = 0;

  if (isNaN(parseInt(str)) || parseInt(str) < 0) return false;

  if (method == 2)
    if (parseInt(str) > 31)
      return false;
  if (method == 1)
    if (parseInt(str) > 12)
      return false;

  for (i = 0; i < str.length; i++)
    if (str.charAt(i) < '0' || str.charAt(i) > '9')
      return false;


  return true;
}

/****************************************************************/

// Displays an alert box with the passed in string...

function PromptErrorMsg(Field,strError)
{
  alert("You have entered an invalid date for \"" + strError + "\".  Please make sure your date format is in M/D/Y format.");
  Field.focus();
}

/**********************************************************************/


/* PURPOSE: Checks to see if the string is a valid date.  A valid
  date is defined as any of the following:

    MM/DD/YY, MM/DD/YYYY, M/D/YY, M/D/YYYY,
    MM-DD-YY, MM-DD-YYYY, M-D-YY, M-D-YYYY
*/

function ForceDate(strDate,strField)
{
  var str = new String(strDate.value);

  if (isWhitespace(str)) {
    return true;
    // if the field is empty, just return true...
  }

  var i = 0, count = str.length, j = 0;
  while ((str.charAt(i) != "/" && str.charAt(i) != "-") && i < count)
    i++;

  if (i == count || i > 2) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  var addOne = false;
  if (i == 2) addOne = true;

  if (!isDateNumber(str.substring(0,i),1)) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  j = i+1;
  i = 0;

  while ((str.charAt(i+j) != "/" && str.charAt(j+i) != "-") && i+j < count)
    i++;

  if (i+j == count || i > 2) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  if (!isDateNumber(str.substring(j,i+j),2)) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  j = i+3;
  i = 0;

  if (addOne) j++;

  while (i+j < count)
    i++;


  if (i != 2 && i != 4) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  if (!isDateNumber(str.substring(j,i+j),3)) {
    PromptErrorMsg(strDate,strField);
    return false;
  }

  return true;
}

/****************************************************************/

// This function determines if the string passed in is a valid
// US zip code.  It accepts either ##### or #####-####.  If the
// string is valid, it returns true, else false.

function isZipcode(strZip)
{
  var s = new String(strZip);

  if (s.length != 5 && s.length != 10)
    // inappropriate length
    return false;


  for (var i=0; i < s.length; i++)
    if ((s.charAt(i) < '0' || s.charAt(s) > '9') && s.charAt(i) != '-')
      return false;

  return true;
}

/****************************************************************/

// This function ensures that a field is less than or equal to the
// Length passed in.  You must call this function with the element
// name in your form (for example: "ForceLength(document.forms[0].txtElement)"
// as opposed to "ForceLength(document.forms[0].txtElement.value)"
// If the field's value is too large, an error message is displayed
// and false is returned, else true is returned.
function ForceLength(objField, nLength, strWarning)
{
  var strField = new String(objField.value);

  if (strField.length > nLength) {
    alert(strWarning);
    objField.focus();
    return false;
  } else
    return true;
}

/****************************************************************/

/****************************************************************/

// This function ensures that a field is greater than the
// Length passed in.  You must call this function with the element
// name in your form (for example: "ForceLength(document.forms[0].txtElement)"
// as opposed to "ForceLength(document.forms[0].txtElement.value)"
// If the field's value is small, an error message is displayed
// and false is returned, else true is returned.
function ForceMinLength(objField, nLength, strWarning)
{
  var strField = new String(objField.value);
  if (strField.length < nLength) {
    alert(strWarning);
    objField.focus();
    return false;
  } else
    return true;
}

/****************************************************************/

// This function compare two fields
function Compare(objField1, objField2,strWarning)
{
  var strField1 = new String(objField1.value);
  var strField2 = new String(objField2.value);
  if (strField1.toString() != strField2.toString()) {
    alert(strWarning);
    objField1.focus();
    return false;
  } else
    return true;
}

/****************************************************************/

// This function determines if the string passed in is contains only alphabats.
// It accepts characters A-Z and a-z
// string is valid, it returns true, else false.

function isLetter (c)
{   
  return (((c >= "a") && (c <= "z")) || ((c >= "A") && (c <= "Z")) || (c==" ") || (c==".") || (c==","));
}



function checkAlpha(objField)
{
  var i;
  var s = new String(objField.value);
  for (i = 0; i < s.length; i++)
    {   
        // Check that current character is letter.
        var c = s.charAt(i);
        if (!isLetter(c))
      return false;
    }
   // All characters are letters.
  return true;
}


function isAlpha(objField, FieldName)
{
  if (!checkAlpha(objField))
  {
    alert("\"" + FieldName + "\" should contains only alphabets.");
    objField.focus();
    objField.select();
    return false;
  }
  return true;
}

// Returns true if character c is a letter or digit.
 
function isLetterOrDigit (c)
{   
  return (isLetter(c) || isDigit(c))
}


// Returns true if character c is a digit 
// (0 .. 9).
 
function isDigit (c)
{   return ((c >= "0") && (c <= "9"))
}

// isAlphanumeric (STRING s [, BOOLEAN emptyOK])
// 
// Returns true if string s is English letters 
// (A .. Z, a..z) and numbers only.
//
// For explanation of optional argument emptyOK,
// see comments of function isInteger.
//
// NOTE: Need i18n version to support European characters.
// This could be tricky due to different character
// sets and orderings for various languages and platforms.
 
function isAlphanumeric (objField) 
{   
  var i; 
  var s;
    // Search through string's characters one by one
    // until we find a non-alphanumeric character.
    // When we do, return false; if we don't, return true.
  s = objField.value;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number or letter.
        var c = s.charAt(i);
    
        if (!isLetterOrDigit(c))
        return false;
    }
 
    // All characters are numbers or letters.
    return true;
}



function validateAlphaNumeric(objField,FieldName)
{
  if (!isAlphanumeric(objField))
  {
    alert("\"" + FieldName + "\" should contains only alphanumeric characters.");
    objField.focus();
    objField.select();
    return false;
  }
  return true;
}

//**************************************************************
// to validate Institute code

function isInstCodeAlphanumeric (objField) 
{   
  var i; 
  var s;
    // Search through string's characters one by one
    // until we find a non-alphanumeric character.
    // When we do, return false; if we don't, return true.
  s = objField.value;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number or letter.
        var c = s.charAt(i);
    
        if (!(((c >= "a") && (c <= "z")) || ((c >= "A") && (c <= "Z")) || (c=="-") || (c >= "0") && (c <= "9")))
        return false;
    }
 
    // All characters are numbers or letters.
    return true;
}



function validateInstCode(objField,FieldName)
{
  if (!isInstCodeAlphanumeric(objField))
  {
    alert("\"" + FieldName + "\" should contains only alphanumeric characters.");
    objField.focus();
    objField.select();
    return false;
  }
  return true;
}

//***********************************************************************


//To validate login field

function isLoginLetterOrDigit (c)
{   
  return (((c >= "a") && (c <= "z")) || ((c >= "A") && (c <= "Z")) || ((c >= "0") && (c <= "9")))
}

function isLoginAlphanumeric (objField) 
{   
  var i; 
  var s;
    // Search through string's characters one by one
    // until we find a non-alphanumeric character.
    // When we do, return false; if we don't, return true.
  s = objField.value;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number or letter.
        var c = s.charAt(i);
    
        if (!isLoginLetterOrDigit(c))
        return false;
    }
 
    // All characters are numbers or letters.
    return true;
}

function validateLogin(objField,FieldName)
{
  if (!isLoginAlphanumeric(objField))
  {
    alert("\"" + FieldName + "\" should contains only alphanumeric characters.");
    objField.focus();
    objField.select();
    return false;
  }
  return true;
}


//-----------------By Saurabh Tripathi on 08/06/06(Trimming Functions)-----------------------
          
      function RTrim(VALUE)
      {
        var w_space = String.fromCharCode(32);
        var v_length = VALUE.length;
        var strTemp = "";
        if(v_length < 0)
        {
          return"";
        }
        var iTemp = v_length -1;

        while(iTemp > -1)
        {
          if(VALUE.charAt(iTemp) == w_space)
          {
          }
          else
          {
            strTemp = VALUE.substring(0,iTemp +1);
            break;
          }
            iTemp = iTemp-1;

        } //End While
        return strTemp;
      } //End Function

      
      
      function LTrim(VALUE)
      {
        var w_space = String.fromCharCode(32);
        if(v_length < 1)
        {
          return"";
        }
        var v_length = VALUE.length;
        var strTemp = "";

        var iTemp = 0;

        while(iTemp < v_length)
        {
          if(VALUE.charAt(iTemp) == w_space)
          {
          }
          else
          {
            strTemp = VALUE.substring(iTemp,v_length);
            break;
          }
          iTemp = iTemp + 1;
        } //End While
        return strTemp;
      } //End Function

    
      
      
      
      function Trim(TRIM_VALUE)
      {
        if(TRIM_VALUE.length < 1)
        {
          return"";
        }
        TRIM_VALUE = RTrim(TRIM_VALUE);
        TRIM_VALUE = LTrim(TRIM_VALUE);
        if(TRIM_VALUE=="")
        {
          return "";
        }
        else
        {
          return TRIM_VALUE;
        }
      } //End Function

      
//-----------------By Saurabh Tripathi on 08/06/06(Trimming Functions)-----------------------


//-----------------By Saurabh Tripathi on 06/08/06(Validate URL)-----------------------------

function ValidateLink(userLink) 
 { 
    var v = new RegExp(); 
    v.compile("^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$"); 
    if (!v.test(userLink.value)) 
     { 
        alert("You must supply a valid URL.It should be in following format \n http://www.userurl.com "); 
        return false; 
     } 
 } 

//-----------------By Saurabh Tripathi on 06/08/06(Validate URL)-----------------------------

//-------Date 28March2008 By Saurabh Tripathi-------------------------------
function CompDate(objField1,objField2,msg)
{
    var now = new Date();
    var today = new Date(now.getYear(),now.getMonth(),now.getDate());
//  alert(now);
//  alert(today);
  var adate = new String(objField1.value);
  var bdate = new String(objField2.value);
  var a = adate.split('/');
  var b = bdate.split('/');
//  alert(a);
//  alert(b);
  var sDate = new Date(a[2],a[0]-1,a[1]);
  var eDate = new Date(b[2],b[0]-1,b[1]);
//  alert(sDate);
//  alert(eDate);
  
  if ((sDate < today) ||(sDate == today))
    {
        alert("Proposed Date Can Not Be Prior To Today's Date");
        objField1.focus();
    objField1.select();
        return false;
    }
    
    
  
  if (sDate < eDate )
  {
    
    return true; 
  }
  else
  {
      
      alert(msg);
      objField2.focus();
    objField2.select();
    return false;
  }

}
//-------Date 28March2008 By Saurabh Tripathi-------------------------------

//-----------
function CompDate(objField1,msg)
{
    var now = new Date();
    var today = new Date(now.getYear(),now.getMonth(),now.getDate());
//  alert(msg);
//  alert("1");
//    alert(today);
  var adate = new String(objField1.value);
  
  var a = adate.split('/');
//  alert("2");
//  alert(a);

  var sDate = new Date(a[2],a[0]-1,a[1]);
//  alert("3");
//  alert(sDate);
//  alert(eDate);


  
  if (sDate > today)
    {
        alert(msg);
        objField1.focus();
    objField1.select();
        return false;
    }
    
    
  
  

}
//-----------

//-----------------By Saurabh Tripathi on 14/10/06(Customized History Back)-------------------
function myHistoryBack()
    {
      var myURL;
      var myURLArray;
      var myURLArrayLength;
      myURL=location.href;
      myURLArray=myURL.split("#")
      myURLArrayLength=myURLArray.length
      
      if(myURLArrayLength!=1)
      {
        location.href=myURLArray[0]
        history.back(); 
      }
      history.back();
    }
//-----------------By Saurabh Tripathi on 14/10/06(Customized History Back)-------------------



//-----------Date 131206 By Saurabh Tripathi-------------------------------

//For:Special Character Check

//Send What so ever is not allowed

//How To Call 

//myAllow="@#" Now @# will not be allowed

//validateSpecial(form.elements["Link_name"],"Link Name",myAllow)

function validateSpecial(objField,FieldName,valid) 

{

var ok = "yes";

var temp;

for (var i=0; i<objField.value.length; i++) 

{

temp = "" + objField.value.substring(i, i+1);

if (valid.indexOf(temp)!="-1") ok = "no";

}

if (ok == "no") 

{

alert("\"" + FieldName + "\" should not contain special characters like  "+valid);

objField.focus();

objField.select(); 

return false;

}

return true;

}

//-----------Date 131206 By Saurabh Tripathi-------------------------------








/****************************************************************/

// <FORM NAME="frmSiteRanking" METHOD="GET" ACTION="SiteRanking.asp" ONSUBMIT="return ValidateData(this.form);">
// usage method 
//      function ValidateData(form) {
//    ************ Mehtod 1 **********************
//            return (
//            ForceEntry(form.elements["username"],"User Name")&&
//    ForceEmail(form.elements["email"])&& 
//    ForceNumber(form.elements["pw"],"Phone No")
//    )
//************ Mehtod 2 **********************
//        var CanSubmit = false;
//
//           // Check to make sure that the full name field is not empty.
//           CanSubmit = ForceEntry(document.forms[0].txtName,"You supply a full name.");
//           // Check to make sure ranking is between 1 and 10
//           if (CanSumbit) CanSubmit = ValidRanking();
//
//           return CanSubmit;
//      }
// -->



 function tabE(obj,e){ //alert("hi");
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
  <!-- Begin
function textCounter(field,cntfield,maxlimit) { 
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->


function chMd()
 {
  // initialize form with empty field
  document.forms[0].dates.disabled=false;
  document.forms[0].dates.value="";

  document.forms[0].amount.disabled=false;
  document.forms[0].amount.value="";

  document.forms[0].bank.disabled=false;
  document.forms[0].bank.value="";


  document.forms[0].reff_net.disabled=false;
  document.forms[0].reff_net.value="";

  document.forms[0].branch.disabled=false;
  document.forms[0].branch.value="";


  document.forms[0].cheque_dd.disabled=false;
  document.forms[0].cheque_dd.value="";

  document.forms[0].cc_dc.disabled=false;
  document.forms[0].cc_dc.value="";




  //document.forms[0].goServer.disabled=false;

  for(var i=0;i<document.forms[0].elements.length;i++)
  {
    if(document.forms[0].elements[i].name=="payment_option")
    {
     if(document.forms[0].elements[i].value=="N")
     {
       if(document.forms[0].elements[i].checked==true){

        document.forms[0].sTextBox.disabled=true;
        document.forms[0].eTextBox.disabled=true;
        

       
       }
     }
     else if(document.forms[0].elements[i].value=="Cash")
     {

       if(document.forms[0].elements[i].checked==true){
        document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=true;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=true;
        document.forms[0].cc_dc.disabled=true;
    document.forms[0].reff_net.disabled=true;
    document.forms[0].branch.disabled=true;
       var bnd1 =document.getElementById("mybank")
        bnd1.options[1].selected=1;}
     }
     else if(document.forms[0].elements[i].value=="Cheque")
     {
       if(document.forms[0].elements[i].checked==true){
        document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=false;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=false;
        document.forms[0].cc_dc.disabled=true;
    document.forms[0].reff_net.disabled=true;
    document.forms[0].branch.disabled=false;
    var bnd1 =document.getElementById("mybank")
        bnd1.options[0].selected=1;       }
     }


else if(document.forms[0].elements[i].value=="DemandDraft")
     {
       if(document.forms[0].elements[i].checked==true){
         document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=false;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=false;
        document.forms[0].cc_dc.disabled=true;
    document.forms[0].reff_net.disabled=true;
    document.forms[0].branch.disabled=false;   
var bnd1 =document.getElementById("mybank")
        bnd1.options[0].selected=1;  
       }
     }



else if(document.forms[0].elements[i].value=="CreditCard")
     {
       if(document.forms[0].elements[i].checked==true){
         document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=false;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=true;
        document.forms[0].cc_dc.disabled=false;
    document.forms[0].reff_net.disabled=true;
    document.forms[0].branch.disabled=false;   
var bnd1 =document.getElementById("mybank")
        bnd1.options[0].selected=1;  
       }
     }



else if(document.forms[0].elements[i].value=="DebitCard")
     {
       if(document.forms[0].elements[i].checked==true){
         document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=false;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=true;
        document.forms[0].cc_dc.disabled=false;
    document.forms[0].reff_net.disabled=true;
    document.forms[0].branch.disabled=false;   
var bnd1 =document.getElementById("mybank")
        bnd1.options[0].selected=1;  
       }
     }


else if(document.forms[0].elements[i].value=="NetBanking")
     {
       if(document.forms[0].elements[i].checked==true){
         document.forms[0].amount.disabled=false;
        document.forms[0].dates.disabled=false;

        document.forms[0].bank.disabled=false;
        document.forms[0].mybank.disabled=false;
        document.forms[0].cheque_dd.disabled=true;
        document.forms[0].cc_dc.disabled=true;
    document.forms[0].reff_net.disabled=false;
    document.forms[0].branch.disabled=false;   
var bnd1 =document.getElementById("mybank")
        bnd1.options[0].selected=1;  
       }
     }

    }
  }
 }

 function test_skill() {
    var junkVal=document.getElementById('amount').value;
    junkVal=Math.floor(junkVal);
    var obStr=new String(junkVal);
    numReversed=obStr.split("");
    actnumber=numReversed.reverse();

    if(Number(junkVal) >=0){
        //do nothing
    }
    else{
        alert('wrong Number cannot be converted');
        return false;
    }
    if(Number(junkVal)==0){
        document.getElementById('container').innerHTML=obStr+''+'Rupees Zero Only';
        return false;
    }
    if(actnumber.length>9){
        alert('Oops!!!! the Number is too big to covertes');
        return false;
    }

    var iWords=["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];
    var ePlace=['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
    var tensPlace=['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];

    var iWordsLength=numReversed.length;
    var totalWords="";
    var inWords=new Array();
    var finalWord="";
    j=0;
    for(i=0; i<iWordsLength; i++){
        switch(i)
        {
        case 0:
            if(actnumber[i]==0 || actnumber[i+1]==1 ) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+' Only';
            break;
        case 1:
            tens_complication();
            break;
        case 2:
            if(actnumber[i]==0) {
                inWords[j]='';
            }
            else if(actnumber[i-1]!=0 && actnumber[i-2]!=0) {
                inWords[j]=iWords[actnumber[i]]+' Hundred and';
            }
            else {
                inWords[j]=iWords[actnumber[i]]+' Hundred';
            }
            break;
        case 3:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Thousand";
            }
            break;
        case 4:
            tens_complication();
            break;
        case 5:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Lakh";
            }
            break;
        case 6:
            tens_complication();
            break;
        case 7:
            if(actnumber[i]==0 || actnumber[i+1]==1 ){
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+" Crore";
            break;
        case 8:
            tens_complication();
            break;
        default:
            break;
        }
        j++;
    }

    function tens_complication() {
        if(actnumber[i]==0) {
            inWords[j]='';
        }
        else if(actnumber[i]==1) {
            inWords[j]=ePlace[actnumber[i-1]];
        }
        else {
            inWords[j]=tensPlace[actnumber[i]];
        }
    }
    inWords.reverse();
    for(i=0; i<inWords.length; i++) {
        finalWord+=inWords[i];
    }
    document.getElementById('container').innerHTML=finalWord;
    document.form1.payment_word.value=finalWord;
}

$(document).ready(function () {
    $("#id_input").keyup(function () {
        $.ajax({
            type: "POST",
            url: "GetCountryName",
            data: {
                keyword: $("#id_input").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#id_input').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#id_input').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="presentation" ><a class="dropdownlivalue">' + value['party_name'] + '</a></li>');
                });
            }
        });
    });

    $('ul.txtcountry').on('click', 'li a', function () {
        $('#id_input').val($(this).text());
    });
});







function ValidateData(form)
  {   
    //alert("1");
    var str=form.elements["bill_date"].value;
    if(str=='')
    {
        alert("bill_date can not be empty.");
        document.form1.bill_date.select();
        return false;
    }
    if(form.elements["payment_option"].value=='')
    {
        alert("Please Select Mode Of Payment!!!!!!!!!!!!!!!.");
        //document.form1.payment_option.focus();
        return false;
    }
    var party_name= form.elements["party_name"].value;
     if(party_name=='cash' || party_name=='Cash')
        { 
          alert("Cash is not allowed as party name.");
          form.elements["party_name"].select();
          return false;
          
        }
        var x;
        x=(
            ForceEntry(form.elements["party_name"],"Please Enter Party Name")  && 
            ForceDate(form.elements["bill_date"],"MM-DD-YY")  && 
            ForceEntry(form.elements["party_add"],"Please Enter Address") && 
            ForceEntry(form.elements["accounthead"],"Please fill Account Head") &&
            ForceEntry(form.elements["amount"],"Please Enter amount") &&
            ForceSelect(form.elements["mybank"],"Please Select Your Bank(Deposit In)") 
          )
      if (x==true)
      form.elements["ids"].value='';
      return x;
      
    }


 function validate_password(obj)
{
   if(obj.old_password.value=='')
    {
    alert("Please Enter Old Password");
    obj.old_password.focus();
    return false;
    }
    else if(obj.new_password.value=='')
    {
    alert("Please Enter New Password");
    obj.new_password.focus();
    return false;
    }
    else if(obj.confirm_password.value=='')
    {
    alert("Please Enter Confirm Password");
    obj.confirm_password.focus();
    return false;
    }
    else if((obj.new_password.value)!=(obj.confirm_password.value))
    {
    alert("Please Enter New an Confirm Passwords Must Be Same");
    obj.new_password.focus();
    return false;
    }
    else{
      return true;
   } 
}