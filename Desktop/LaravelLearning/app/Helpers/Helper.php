<?php

function generateHshId()
{
    return time() . str_random(40);
}
