<?php
    // Take Only Name of Tags
        function takeNameTag(){
            $tags = takeTags();

            foreach ($tags as $key => $value){
                $tagsName[] = $value['Tags_Name'];
            }

            if(isset($tagsName)){
                return $tagsName;
            }else{
               return false;
            }
        }
    //
