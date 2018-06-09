string URL = "http://caworks-sl.de/sl-profil-plugin/sl-profil.php";
key reqid;
default
{
    state_entry()
    {
    }
    touch_start(integer total_number)
    {
        string name_search = llDetectedName(0); // name from avatar
        // search options .. set to 'no' wehn not need this data
        string options = "&birth=yes";      //Born date 
        options +="&dsname=yes";            //Display Name
        options +="&key=yes";               //Avatar Key
        options +="&img_uuid=yes";          //Profile Image UUID
        
        string build_url = URL+"?name="+llEscapeURL(name_search);
        build_url += options;
        reqid = llHTTPRequest(build_url,[],"");
    }
    http_response(key id, integer status, list meta, string body)
    {
        if ( id != reqid )
        {
            return;
        }
        if ( status == 499 )
        {
            llOwnerSay("timed out");
        }
        else if ( status != 200 )
        {
            llOwnerSay("Server Offline");
        }
        else
        {
            //returns at all options are 'yes' 
            //name|av uuid|displayname|Age|profil image uuid
            llSay(0,body);
        }
    }
}