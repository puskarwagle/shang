<?php
// Check if the cURL extension is enabled
if (extension_loaded('curl')) {
    echo "cURL extension is enabled.";
} else {
    echo "cURL extension is not enabled.";
}
