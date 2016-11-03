<?php

namespace B2\WebRoot\Git;

class Hook extends \B2\Page
{
	function pre_show()
	{
		if(!\B2\Cfg::get('webroot.markdown.repo'))
			throw new \Exception(_("Undefined config 'webroot.markdown.repo'"));

//        \bors_debug::syslog('debug-rpc-post', "Github, POST=".print_r(@$_POST, true));
//        \bors_debug::syslog('debug-rpc-payload', "payload=".print_r(json_decode(@$_POST['payload'], true), true));
        // https://github.com/kzykhys/PHPGit
        $git = new \PHPGit\Git();
        $git->setRepository(\B2\Cfg::get('webroot.markdown.repo'));
        $git->pull();
		echo "Pull ok";
        return true;
	}
}
