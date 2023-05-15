<?php
function validateTitle($title) {
    if(strlen($title) > MAX_LENGTH){
       return "Title is too long";
    }
    elseif(strlen($title) < MIN_LENGTH){
        return "Title is too short";
    }
    else{
        return "";
    }
}

function validateSummary($summary) {
    if(strlen($summary) > SUMMARY_MAX_LENGTH){
        return "Summary is too long";
    }
    elseif(strlen($summary)< SUMMARY_MIN_LENGTH){
        return "Summary is too short";
    }
    else {
        return "";
    }
}

// function validateArticle($full_article) {
//     if(strlen($full_article) > FULLARTICLE_MAX_LENGTH){
//        return "Acticle is too long";
//     }
//     elseif(strlen($full_article) < FULLARTICLE_MIN_LENGTH){
//        return "Article is too short";
//     }
//     else {
//         return "";
//     }
//}


?>