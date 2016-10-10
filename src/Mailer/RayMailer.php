<?php
namespace RayMailer\Mailer;

use Cake\Mailer\Mailer;
use Cake\Mailer\Transport\DebugTransport;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

class RayMailer extends Mailer
{

	/**
	 * Runtime parameters.
     * 
	 * @var array
	 */
	public $defaultParams = array();
	public $headers = array('X-Mailer' => 'RayMailer');
	public $sender = ['gplife3@grameenphone.com' => 'GP Life 3'];

	/**
     * Prepare mail from database Template and and Layout
     *
     * @param string $template slug value for the template
     * @param array $params
     * @param array $options
     * @return boolean
     */
    public function prepare($slug, $params = array(), $options = array()) {
    	$this->defaultParams['_year'] = date('Y');

    	$template = TableRegistry::get('RayMailer.Templates')->find()->contain(['Layouts'])->where(['Templates.slug' => $slug, 'Templates.status' => 'Active'])->first();

    	if (empty($template)) {
    		Log::write('error', "RayEmailer: Could not find email template {$slug} in the database.");
    	}

    	// email config
    	$emailServerConfig = empty($options['config']) ? 'default' : $options['config']; 
        if (!empty($template->transport)) {
            $emailServerConfig = $template->transport;
        }

        // from
        if (!empty($options['from'])) {
            $from = $options['from'];
        } else {
            // Get sender from database
            if (!empty($template->sender_email)) {
                $from = array($template->sender_email => !empty($template->sender_name) ? $template->sender_name : $template->sender_email);
            } elseif (!empty($template->layout->sender_email)) {
                $from = array($template->layout->sender_email => !empty($template->layout->sender_name) ? $template->layout->sender_name : $template->layout->sender_email);
            } else {
                $from = array('no-reply@localhost' => 'localhost');
                Log::write('error', "RayEmailer: Could not find from email address.");
            }
        }

        // reply to
        if (!empty($options['replyTo'])) {
            $replyTo = $options['replyTo'];
        } elseif (!empty($template->reply_to)) {
            $replyTo = $template->reply_to;
        } elseif (!empty($template->layout->reply_to)) {
            $replyTo = $template->layout->reply_to;
        }

        $this->profile($emailServerConfig);

        // set emails
        $this->to($params['to']);
        $this->emailFormat(strtolower($template->layout->type));
        $this->sender($this->sender);

        if (!empty($replyTo)) {
	        $this->replyTo($replyTo);
	    }
        
        if (!empty($from)) {
        	$this->from($from);
        }

        // parameters
        if (!empty($this->defaultParams)) {
            $params = array_merge($this->defaultParams, $params);
        }

        $paramsSearch = array_map(create_function('$a', 'return "{" . $a . "}";'), array_keys($params));
        $this->subject(str_replace($paramsSearch, $params, $template->subject));
        $content = str_replace($paramsSearch, $params, str_replace('{content_of_email_template}', $template->body, $template->layout->body));

        if (!empty($options['attachments'])) {
        	$this->attachments($options['attachments']);
        }

        if (!empty($options['cc'])) {
        	$this->cc($options['cc']);
        }

        if (!empty($options['bcc'])) {
        	$this->bcc($options['bcc']);
        }

        if (!empty($options['headers'])) {
        	$this->headers = array_merge($this->headers, $options['headers']);
        }

        if (!empty($this->headers)) {
			$this->addHeaders($this->headers);
		}

        if (!empty($options['debug'])) {
            $transport = new DebugTransport();
			$this->transport($transport);
        }

        return $this->_email->send($content);
    }
}
