<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Popup extends Component
{
    public $type;
    public $onclick;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $onclick)
    {
        $this->type = $type;
        $this->onclick = $onclick;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            [
                'type' => 'privacy',
                'title' => 'Privacy Policy',
                'content' => 'We are committed to protecting your personal information and ensuring your privacy. Any data you provide, including your name, contact details, and address, will be securely stored and used solely for managing your membership and related political activities. We do not sell or share your information with third parties without your consent, except as required by law. By using our platform, you agree to our data collection and usage policies. If you have any concerns or wish to request data removal, please contact us.',
            ],
            [
                'type' => 'membership',
                'title' => 'What is Membership?',
                'content' => 'Becoming a member means joining a community of dedicated individuals working together to create a better future. As a member, you\'ll have access to events, discussions, and campaigns that shape policies and drive meaningful change. Whether you want to support initiatives, engage with like-minded individuals, or even stand for election, your membership gives you the tools and opportunities to make a difference. By joining, you become part of a collective effort to build a stronger and fairer society, where your voice matters and your participation helps shape the direction of our movement.',
            ],
            [
                'type' => 'terms',
                'title' => 'Terms & Conditions',
                'content' => 'By using our platform, you agree to our data collection and usage policies. If you have any concerns or wish to request data removal, please contact us.',
            ],
            [
                'type' => 'faq',
                'title' => 'Frequently Asked Questions',
                'content' => 'If you have any concerns or wish to request data removal, please contact us.',
            ],
            [
                'type' => 'help',
                'title' => 'Help',
                'content' => 'If you have any concerns or wish to request data removal, please contact us.',
            ],
            [
                'type' => 'support',
                'title' => 'Support',
                'content' => 'If you have any concerns or wish to request data removal, please contact us.',
            ],
        ];

        // Filter data to get the matching type
        $filteredData = array_filter($data, fn($item) => $item['type'] === $this->type);

        return view('components.popup', ['data' => array_values($filteredData)[0], 'onclick' => $this->onclick]);
    }
}
