<?php

use Latte\Runtime as LR;

/** source: C:\dev\htdocs\great-website-studio\app\views\layouts\root.latte */
final class Template2991076628 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>';
		echo LR\Filters::escapeHtmlText($title) /* line 9 */;
		echo '</title>
</head>

<body>

';
		$this->renderBlock('content', get_defined_vars()) /* line 14 */;
		echo '
</body>

</html>';
	}


	/** {block content} on line 14 */
	public function blockContent(array $ʟ_args): void
	{
	}
}
