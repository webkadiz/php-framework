<?php

function ext($path) {
	return pathinfo($path, PATHINFO_EXTENSION);
}

function filename($path) {
	return pathinfo($path, PATHINFO_FILENAME);
}