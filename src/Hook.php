<?php

namespace B2\WebRoot\Git;

class Hook extends \B2\Page
{
	function pre_show()
	{
        \bors_debug::syslog('00-rpc', "Github");
        \bors_debug::syslog('00-rpc', "payload=".print_r(json_decode(@$_POST['payload'], true), true));
        // https://github.com/kzykhys/PHPGit
        $git = new \PHPGit\Git();
        $git->setRepository(\B2\Cfg::get('webroot.markdown.repo'));
        $git->pull();
        return "Pull ok";
	}
}
