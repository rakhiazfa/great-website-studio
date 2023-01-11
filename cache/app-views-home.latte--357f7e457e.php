<?php

use Latte\Runtime as LR;

/** source: C:\dev\htdocs\great-website-studio/app/views/home.latte */
final class Template357f7e457e extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = 'layouts/root.latte';
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		echo '
<div>

    <section>

        <h1>Great Website Studio</h1>

        <p>A simple framework for building websites.</p>

    </section>

    <footer>

        <p>Copyright &copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 17 */;
		echo ' - <a href="https://great.web.id" target="_blank">Great Website Studio</a></p>

    </footer>

</div>

';
	}
}
