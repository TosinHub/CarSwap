<?php
session_start();
session_regenerate_id(true);
session_regenerate_id();

header("Location: ./");