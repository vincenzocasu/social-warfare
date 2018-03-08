<?php

/**
 * SWP_Ooption_Select: The class used to create select options.
 *
 * This class is used to create each select option needed on the options page.
 *
 * @since  2.4.0   | Created | 02 MAR 2017
 * @access public
 *
 */
class SWP_Option_Select extends SWP_Option {


	/**
	 * Choices
	 *
	 * Contains a key->value array designating the available
	 * options that the plugin user can select from the select dropdown box.
	 *
	 * @var array
	 *
	 */
	public $choices = array();


	/**
	 * The __construct magic method.
	 *
	 * This method is used to instantiate the class.
	 *
	 * @param $name The name printed with the select.
	 * @return none
	 *
	 */
     public function __construct( $name ) {
         parent::__construct( $name );

         $this->choices = array();
     }


	/**
	 * A method for setting the available choices for this option.
	 *
	 * Accepts a $key->value set of options which will later be used to
	 * generate the select dropdown boxes from which the plugin user can select.
	 *
	 * This method will overwrite any existing choices previously set. If you
	 * want to add a choice, use add_choice or add_choices instead.
	 *
	 * @since 2.4.0 | 02 MAR 2018 | Created
	 * @param array $choices
	 * @return object $this Allows for method chaining
	 * @TODO: Use the throw() method instead of simply returning false.
	 *
	 */
    public function set_choices( $choices )  {

        if ( !is_array( $choices ) ) {
            $this->throw( "You must provide an array of choices to go into the select." );
        }

        $this->choices = $choices;

        return $this;
    }

    /**
     * Create the options for a select dropdown.
     *
     * @since 2.4.0 | 02 MAR 2018 | Created
     * @param array $choices Array of strings to be translated and made into options.
     * @return SWP_Option_Select $this This object with the updated choices.
     *
     */
    public function add_choices( $choices )  {

        if ( !is_array( $choices ) ) {
            $this->throw( "Please provide an array of choices. If you want to add a single choice, use add_choice()." );
        }

        foreach( $choices as $choice ) {
            $this->add_choice( $choice );
        }

        return $this;
    }


    /**
    * Add an option to the select.
    *
    * Additional addons may want to expand the choices available for
    * a given option.
    *
    * @since 2.4.0 | 02 MAR 2018 | Created
    * @param string $choice The choice to add to the select.
    * @return object $this Allows for method chaining
    * @TODO: Sanitize the input with the throw() method.
    * @TODO: Make this function actually do something (i.e. make it merge these choices
    * 		  into the existing array of choices.)
    * @return SWP_Option_Select $this The calling object with an updated chocies array.
    */
     public function add_choice( $choice ) {
         if ( !is_string( $choice ) ) {
             $this->throw( "Please provide a choice to add to the select. The choice must be passed as a string." );
         }

         array_push( $this->choices, __( $choice, 'social-warfare' ) );

         return $this;
     }

     /**
 	 * Render the HTML
 	 *
 	 * Renders the HTML to the options page based on what
 	 * the properties of this object have been set to.
 	 *
 	 * @since 2.4.0 | 02 MAR 2018 | Created
 	 * @param none
 	 * @return string The rendered HTML of this option.
 	 * @TODO: Make this method render soem HTML.
 	 *
 	 */
     public function render_HTML() {

     }

}