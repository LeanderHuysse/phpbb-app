<?php
/**
*
* @package phpBB3
* @copyright (c) 2013 phpBB Group, sections (c) 2009 Fabien Potencier, Armin Ronacher
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

class phpbb_template_twig_node_includephp extends Twig_Node
{
	/** @var Twig_Environment */
	protected $environment;

    public function __construct(Twig_Node_Expression $expr, phpbb_template_twig_environment $environment, $ignoreMissing = false, $lineno, $tag = null)
    {
    	$this->environment = $environment;

        parent::__construct(array('expr' => $expr), array('ignore_missing' => (Boolean) $ignoreMissing), $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param Twig_Compiler A Twig_Compiler instance
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

		$config = $this->environment->get_phpbb_config();

		if (!$config['tpl_allow_php'])
		{
			$compiler
				->write("// INCLUDEPHP Disabled\n")
			;

			return;
		}

        if ($this->getAttribute('ignore_missing')) {
            $compiler
                ->write("try {\n")
                ->indent()
            ;
        }

		// Replace variables in the expression
		$expr = preg_replace('#{{ ([a-zA-Z0-9_]+) }}#', '\' . ((isset($context["$1"])) ? $context["$1"] : null) . \'', $this->getNode('expr')->getAttribute('value'));

		$compiler
			->write("if (phpbb_is_absolute('$expr')) {\n")
			->indent()
				->write("require('$expr');\n")
			->outdent()
			->write("} else {\n")
			->indent()
				->write("require(\$this->getEnvironment()->get_phpbb_root_path() . '")
				->raw($expr)
				->raw("');\n")
			->outdent()
			->write("}\n")
		;

        if ($this->getAttribute('ignore_missing')) {
            $compiler
                ->outdent()
                ->write("} catch (Twig_Error_Loader \$e) {\n")
                ->indent()
                ->write("// ignore missing template\n")
                ->outdent()
                ->write("}\n\n")
            ;
        }
    }
}
