<?php
    // Take Only Name of Tags
        function takeNameTag(){
            $tags = takeTags();

            foreach ($tags as $key => $value){
                $tagsName[] = $value['Tags_Name'];
            }

            return $tagsName;
        }
    //
