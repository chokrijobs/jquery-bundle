<?php

namespace Schokri\JqueryBundle\Twig\Extension;

/**
 * JqueryExtension
 *
 * @author chokri
 */
class JqueryExtension extends \Twig_Extension {

    /**
     *
     * @var \Twig_Environment
     */
    protected $environment;
    /**
     * 
     * @param \Twig_Environment $environment
     */
    public function __construct(\Twig_Environment $environment) {
        $this->environment = $environment;
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions() {
        return array(
            'jquery_autocomplete' => new \Twig_Function_Method($this, 'autocomplete', array('is_safe' => array('html'))),
        );
    }

    public function autocomplete($autcomplete) {
        return $this->environment->render('JqueryBundle:Jquery:index.html.twig', array(
            'autcomplete' => $autcomplete,
        ));
    }

    /**
     * Get Name
     * @return string
     */
    public function getName() {
        return 'jquery';
    }

}
