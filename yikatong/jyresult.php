<?php
session_start();
header("Content-type: text/html; charset=utf-8");
if(!empty($_SESSION['name'])){ ?>
<?php  
    include 'function.php';
    $begin = $_GET['begin'];
    $end = $_GET['end']; 
    $cookie = dirname(__FILE__) . '/cookie/' . $_SESSION['id'] . '.txt';
    $url = "http://ecard.sdut.edu.cn/EcardInfo/CustStateInfo_Seach.aspx?outid=". $_SESSION['xuehao'];
    $page=$_GET['page']; 
    if($page==1){
        $post = array(
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$ScriptManager1' => 'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$ScriptManager1|ctl00$ContentPlaceHolder1$CustStateInfoAscx1$btnSeach',
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATE' => '/wEPDwUKLTE5MTY1NTEyOA9kFgJmD2QWAgIDD2QWBAIBD2QWAmYPFgIeC18hSXRlbUNvdW50AgwWGGYPZBYCZg8VBQbov5Tlm540Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMS5HSUYeLi4vVVNFUklORk8vQ2hvb3NlQ2FyZF9IRy5hc3B4ZAIBD2QWAmYPFQUM5Z+65pys5L+h5oGvNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjFfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMV8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xXzEuR0lGGS4vVVNFUkJBU0VJTkZPX1NFQUNILkFTUFhkAgIPZBYCZg8VBQzlrZjmrL7kv6Hmga81Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMS5HSUYWLi9GRVRDSElORk9fU0VBQ0guQVNQWGQCAw9kFgJmDxUFEuWFtuS7luenkeebruS/oeaBrzUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8xLkdJRhYuL09USEVSSU5GT19TRUFDSC5BU1BYZAIED2QWAmYPFQUM5raI6LS56K6w5b2VNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzEuZ2lmGC4vQ09OU1VNRUlORk9fU0VBQ0guQVNQWGQCBQ9kFgJmDxUFDOS/ruaUueWvhueggTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8xLkdJRh0uLi9VU0VSSU5GTy9VU0VSUkVTRVRQV0QuQVNQWGQCBg9kFgJmDxUFBui/lOWbnjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8xLkdJRhIuLi9JTkRFWF9NQUlOLkFTUFhkAgcPZBYCZg8VBRLkuqTmmJPmsYfmgLvkv6Hmga81Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMS5naWYaLi9DdXN0U3RhdGVJbmZvX1NlYWNoLmFzcHhkAggPZBYCZg8VBRLkuKrkurrkv6Hmga/nu7TmiqQ1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMS5naWYWLi9DdXN0SW5mb01hbmFnZXIuYXNweGQCCQ9kFgJmDxUFEuWciOWtmOetvue6pue7tOaKpDUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8xLmdpZhcuL0JhbmtReUluZm9fU2VhY2guYXNweGQCCg9kFgJmDxUFDOe7vOWQiOS/oeaBrzQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4yXzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjJfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMl8xLkdJRhQuL1VTRVJTRUFDSElORk8uQVNQWGQCCw9kFgJmDxUFDOiHquWKqeaMguWksTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8xLkdJRhkuLi9VU0VSSU5GTy9VU0VSTE9TUy5BU1BYZAIDD2QWBAIBDw8WAh4QQ3VycmVudFBvc3RhdGlvbgUS5Lqk5piT5rGH5oC75L+h5oGvZBYCAgEPDxYCHgRUZXh0BRLkuqTmmJPmsYfmgLvkv6Hmga9kZAIDD2QWAgIJD2QWAmYPZBYEAgEPZBYCAgEPPCsADQBkAgMPZBYCAgEPDxYCHg9Jc05lZWRTeXNMb2dvdXQFBWZhbHNlZBYGAgEPDxYCHwJlZGQCAw8PFgIfAmVkZAIFDw8WAh8CBQVmYWxzZWRkGAEFNWN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkQ3VzdFN0YXRlSW5mb0FzY3gxJGdyaWRWaWV3D2dkgdgU9jLscaE4YpQHKdpRz5ZxD3Y=',
            '__EVENTVALIDATION' => '/wEWBAK5r/6CBwLHldyCAwLHlbTjBwKAzISADGFj7ciozLCmqkXDxEdwo36ALdy/',
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$sDateTime' => $begin,
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$eDateTime' => $end,
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$btnSeach' => ''
        );
        $content=login_post($url, $cookie, http_build_query($post));
        $pagesum=0;
        preg_match_all('/href="javascript:_+([^<>]+)"/', $content, $page);
        $page1=count($page[1]);
        if($page1>1){
            $pagesum=substr($page[1][$page1-1],72,-2);
        }  
        preg_match_all('/<td>([^<>]+)<\/td>/', $content, $arrwhite);
        preg_match_all('/<font color="#000099">([^<>]+)<\/font>/', $content, $arrblue);
    }
    else{
        $post = array(
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$ScriptManager1' => 'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$UpdatePanel2|ctl00$ContentPlaceHolder1$CustStateInfoAscx1$AspNetPager1',
            '__EVENTTARGET' => 'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$AspNetPager1',
            '__EVENTARGUMENT' => $page,
            '__VIEWSTATE' => '/wEPDwUKLTE5MTY1NTEyOA9kFgJmD2QWAgIDD2QWBAIBD2QWAmYPFgIeC18hSXRlbUNvdW50AgwWGGYPZBYCZg8VBQbov5Tlm540Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMS5HSUYeLi4vVVNFUklORk8vQ2hvb3NlQ2FyZF9IRy5hc3B4ZAIBD2QWAmYPFQUM5Z+65pys5L+h5oGvNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjFfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMV8wLkdJRjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xXzEuR0lGGS4vVVNFUkJBU0VJTkZPX1NFQUNILkFTUFhkAgIPZBYCZg8VBQzlrZjmrL7kv6Hmga81Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMC5HSUY1Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMTJfMS5HSUYWLi9GRVRDSElORk9fU0VBQ0guQVNQWGQCAw9kFgJmDxUFEuWFtuS7luenkeebruS/oeaBrzUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xMF8xLkdJRhYuL09USEVSSU5GT19TRUFDSC5BU1BYZAIED2QWAmYPFQUM5raI6LS56K6w5b2VNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzAuZ2lmNS4uL0FwcF9UaGVtZXMvRGVmYXVsdC9JbWFnZXMvU2VhY2hCdG5fSW1nL2J0bjQwXzEuZ2lmGC4vQ09OU1VNRUlORk9fU0VBQ0guQVNQWGQCBQ9kFgJmDxUFDOS/ruaUueWvhueggTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNF8xLkdJRh0uLi9VU0VSSU5GTy9VU0VSUkVTRVRQV0QuQVNQWGQCBg9kFgJmDxUFBui/lOWbnjQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE40XzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjRfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlRONF8xLkdJRhIuLi9JTkRFWF9NQUlOLkFTUFhkAgcPZBYCZg8VBRLkuqTmmJPmsYfmgLvkv6Hmga81Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjZfMS5naWYaLi9DdXN0U3RhdGVJbmZvX1NlYWNoLmFzcHhkAggPZBYCZg8VBRLkuKrkurrkv6Hmga/nu7TmiqQ1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMC5naWY1Li4vQXBwX1RoZW1lcy9EZWZhdWx0L0ltYWdlcy9TZWFjaEJ0bl9JbWcvYnRuMjhfMS5naWYWLi9DdXN0SW5mb01hbmFnZXIuYXNweGQCCQ9kFgJmDxUFEuWciOWtmOetvue6pue7tOaKpDUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8wLmdpZjUuLi9BcHBfVGhlbWVzL0RlZmF1bHQvSW1hZ2VzL1NlYWNoQnRuX0ltZy9idG4yOV8xLmdpZhcuL0JhbmtReUluZm9fU2VhY2guYXNweGQCCg9kFgJmDxUFDOe7vOWQiOS/oeaBrzQuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4yXzAuR0lGNC4uL0FQUF9USEVNRVMvREVGQVVMVC9JTUFHRVMvU0VBQ0hCVE5fSU1HL0JUTjJfMC5HSUY0Li4vQVBQX1RIRU1FUy9ERUZBVUxUL0lNQUdFUy9TRUFDSEJUTl9JTUcvQlROMl8xLkdJRhQuL1VTRVJTRUFDSElORk8uQVNQWGQCCw9kFgJmDxUFDOiHquWKqeaMguWksTUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8wLkdJRjUuLi9BUFBfVEhFTUVTL0RFRkFVTFQvSU1BR0VTL1NFQUNIQlROX0lNRy9CVE4xNV8xLkdJRhkuLi9VU0VSSU5GTy9VU0VSTE9TUy5BU1BYZAIDD2QWBAIBDw8WAh4QQ3VycmVudFBvc3RhdGlvbgUS5Lqk5piT5rGH5oC75L+h5oGvZBYCAgEPDxYCHgRUZXh0BRLkuqTmmJPmsYfmgLvkv6Hmga9kZAIDD2QWBAIJD2QWAmYPZBYEAgEPZBYCAgEPPCsADQEADxYEHgtfIURhdGFCb3VuZGcfAAIIZBYCZg9kFhICAQ9kFgxmDw8WAh8CBQMxMDVkZAIBDw8WAh8CBQzlhpzooYzlnIjlrZhkZAICDw8WAh8CBQQxMjUwZGQCAw8PFgIfAgUBMGRkAgQPDxYCHwIFATBkZAIFDw8WAh8CBQEwZGQCAg9kFgxmDw8WAh8CBQMxNTdkZAIBDw8WAh8CBRXmlK/ku5jlrp3lhYXlgLzpoobmrL5kZAICDw8WAh8CBQQxODAwZGQCAw8PFgIfAgUBMGRkAgQPDxYCHwIFATBkZAIFDw8WAh8CBQEwZGQCAw9kFgxmDw8WAh8CBQMyMTBkZAIBDw8WAh8CBQzppJDotLnmlK/lh7pkZAICDw8WAh8CBQcyNTU3LjE0ZGQCAw8PFgIfAgUBMGRkAgQPDxYCHwIFATBkZAIFDw8WAh8CBQEwZGQCBA9kFgxmDw8WAh8CBQMyMTFkZAIBDw8WAh8CBQzmt4vmtbTmlK/lh7pkZAICDw8WAh8CBQYxNDAuMjZkZAIDDw8WAh8CBQEwZGQCBA8PFgIfAgUBMGRkAgUPDxYCHwIFATBkZAIFD2QWDGYPDxYCHwIFAzIxM2RkAgEPDxYCHwIFDOS4iuacuuaUr+WHumRkAgIPDxYCHwIFBDcuMDJkZAIDDw8WAh8CBQEwZGQCBA8PFgIfAgUBMGRkAgUPDxYCHwIFATBkZAIGD2QWDGYPDxYCHwIFAzIxNWRkAgEPDxYCHwIFDOWVhuWcuui0reeJqWRkAgIPDxYCHwIFAjQwZGQCAw8PFgIfAgUBMGRkAgQPDxYCHwIFATBkZAIFDw8WAh8CBQEwZGQCBw9kFgxmDw8WAh8CBQMyMTlkZAIBDw8WAh8CBQ/nvZHnu5zkv6Hmga/otLlkZAICDw8WAh8CBQMyMDBkZAIDDw8WAh8CBQEwZGQCBA8PFgIfAgUBMGRkAgUPDxYCHwIFATBkZAIID2QWDGYPDxYCHwIFAzIyMmRkAgEPDxYCHwIFD+i0reeDreawtOaUr+WHumRkAgIPDxYCHwIFBDYuNDdkZAIDDw8WAh8CBQEwZGQCBA8PFgIfAgUBMGRkAgUPDxYCHwIFATBkZAIJDw8WAh4HVmlzaWJsZWhkZAIDD2QWAgIBDw8WAh4PSXNOZWVkU3lzTG9nb3V0BQVmYWxzZWQWBgIBDw8WAh8CZWRkAgMPDxYCHwJlZGQCBQ8PFgIfAgUFZmFsc2VkZAILD2QWAmYPZBYCAgEPDxYCHgtSZWNvcmRjb3VudAIJZGQYAQU1Y3RsMDAkQ29udGVudFBsYWNlSG9sZGVyMSRDdXN0U3RhdGVJbmZvQXNjeDEkZ3JpZFZpZXcPPCsACgEIAgFkPvqoTTdm33WoSF0djVpzDEhgRr8=',
            '__EVENTVALIDATION' => '/wEWBALr6anzBwLHldyCAwLHlbTjBwKAzISADBNf2p8eV/JlDp+TuaAfb5gI/lpd',
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$sDateTime' => $begin,
            'ctl00$ContentPlaceHolder1$CustStateInfoAscx1$eDateTime' => $end,
        );
        $content=login_post($url, $cookie, http_build_query($post));
        preg_match_all('/<td>([^<>]+)<\/td>/', $content, $arrwhite);
        preg_match_all('/<font color="#000099">([^<>]+)<\/font>/', $content, $arrblue);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>一卡通查询 | 青春在线</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../statics/css/weui.min.css">
    <link rel="stylesheet" href="../statics/css/custom.css">
</head>

<body ontouchstart>
    <div class="hd">
        <h1 class="youth_page_title">交易汇总信息</h1>
        <p class="youth_page_desc"><?php echo $begin ." - ". $end;   ?></p>
    </div>
    <div class="bd">
        <div class="page_content">
            <div class="weui_cells_title">交易汇总信息</div>
            <div class="weui_cells">
                <?php  
                    if($arrwhite[0][4]!=""){ 
                        for ($i=2;$i<=count($arrwhite[0]);$i+=6) {
                            echo '<div class="weui_cell">';
                            echo '<div class="weui_cell_bd weui_cell_primary">';
                            echo '<p>'.$arrwhite[1][$i-1].'<p>';
                            echo '</div>';
                            echo '<div class="weui_cell_ft">';
                            echo $arrwhite[1][$i];
                            echo '</div>';
                            echo '</div>';
                        }
                    }    
                    else{
                        echo "<script>alert('没有查到数据，可能是因为没有消费或者一卡通查询系统不稳定');history.go(-1);</script>";
                    }
                    if($arrblue[0][4]!=""){ 
                        for ($i=2;$i<=count($arrblue[0]);$i+=6) {
                            echo '<div class="weui_cell">';
                            echo '<div class="weui_cell_bd weui_cell_primary">';
                            echo '<p>'.$arrblue[1][$i-1].'<p>';
                            echo '</div>';
                            echo '<div class="weui_cell_ft">';
                            echo $arrblue[1][$i];
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>     
    </div>
    <div class="pagediv">
        <?php   
            if($pagesum>1){
                for ($i=1;$i<=$pagesum; $i++) { 
                    echo "<a class='page' href='jyresult.php?begin=$begin&end=$end&page=$i'>"."第".$i."页"."</a>";
                    if($i!=1&&$i%5==0){
                        echo "<br>";
                    }
                }
            } 
        ?>
    </div>
</body>
</html>
<?php }else{ ?>
 	<script type="text/javascript">alert('这里什么也没有，请检查你的密码是否输入正确');
	window.location.href = "index.php";</script>
<?php } ?>
