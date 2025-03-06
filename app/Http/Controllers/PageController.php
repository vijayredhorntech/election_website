<?php

namespace App\Http\Controllers;

use App\Facades\CustomLog;
use App\Mail\ContactMail;
use App\Models\News;
use App\Models\Event;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
     public function index()
     {
          $data = [
               'title' => 'One Nation – A Movement for a Stronger Britain',
               'meta_description' => 'Join One Nation Party in building a better, fairer, and stronger future for Britain.',
               'hero' => [
                    'title' => 'Welcome to One Nation',
                    'subtitle' => 'A Movement for a Stronger Britain',
                    'description' => 'One Nation is a political movement dedicated to addressing injustices, resolving issues for the public, and ensuring fair representation, inclusivity, and accountability.',
                    'cta' => 'Join Us Today',
                    'cta_link' => route('joinUs')
               ],
               'features' => [
                    [
                         'icon' => 'justice',
                         'title' => 'Justice & Representation',
                         'description' => 'Ensuring every member has a voice in addressing public concerns.'
                    ],
                    [
                         'icon' => 'education',
                         'title' => 'Public Education',
                         'description' => 'Spreading awareness on social justice, human rights, and sustainability.'
                    ],
                    // Add more features...
               ],
               'latest_news' => News::latest()->take(3)->get(),
               'upcoming_events' => Event::upcoming()->take(3)->get()
          ];

          return view('front.index', compact('data'));
     }
     public function donate()
     {
          return view('front.donate', [
               'stripeKey' => config('services.stripe.key')
          ]);
     }
     public function donnerDetails()
     {
          return view('front.donner-details');
     }
     public function paymentMethod()
     {
          return view('front.payment-method');
     }

     public function whatIsMembership()
     {
          return view('front.what-is-membership');
     }

     public function about()
     {
          $data = [
               'title' => 'About One Nation Party',
               'meta_description' => 'Learn about One Nation Party\'s vision, values, and leadership.',
               'vision' => [
                    'title' => 'Our Vision & Values',
                    'points' => [
                         'Addressing injustices and providing resolutions to public concerns',
                         'Promoting public education on key social, environmental, and political issues',
                         // Add more points...
                    ]
               ],
               'leadership' => [
                    'name' => 'Jaginder Singh Nichal',
                    'role' => 'Founder',
                    'bio' => '...' // Add bio
               ]
          ];

          return view('front.about', compact('data'));
     }

     public function events()
     {
          $events = Event::upcoming()->paginate(9);
          return view('front.events', compact('events'));
     }

     public function privacyPolicy()
     {
          $data = [
               'title' => 'Privacy Policy - One Nation',
               'meta_description' => 'Read our privacy policy to understand how One Nation Party handles and protects your personal information.'
          ];

          return view('front.privacy-policy', compact('data'));
     }

     public function terms()
     {
          $data = [
               'title' => 'Terms & Conditions - One Nation',
               'meta_description' => 'Read our terms and conditions for using One Nation Party services and website.'
          ];

          return view('front.terms', compact('data'));
     }

     public function manifesto()
     {
          $data = [
               'title' => 'Our Manifesto - One Nation',
               'meta_description' => 'Read One Nation Party\'s manifesto and our vision for a better, fairer, and stronger Britain.'
          ];

          return view('front.manifesto', compact('data'));
     }

     public function faq()
     {
          $data = [
               'title' => 'Frequently Asked Questions - One Nation',
               'meta_description' => 'Find answers to common questions about One Nation Party, membership, and our policies.'
          ];

          return view('front.faq', compact('data'));
     }

     public function codeOfConduct()
     {
          $data = [
               'title' => 'Code of Conduct - One Nation',
               'meta_description' => 'Read our code of conduct that guides One Nation Party members and representatives.'
          ];

          return view('front.code-of-conduct', compact('data'));
     }

     public function contact()
     {
          $data = [
               'title' => 'Contact Us - One Nation',
               'meta_description' => 'Get in touch with One Nation Party. We\'re here to listen and help.'
          ];

          return view('front.contact', compact('data'));
     }

     public function news()
     {
          $data = [
               'title' => 'Latest News - One Nation',
               'meta_description' => 'Stay updated with the latest news and updates from One Nation Party.'
          ];

          $news = News::latest()->paginate(9);
          return view('front.news', compact('data', 'news'));
     }

     public function leadership()
     {
          $data = [
               'title' => 'Our Leadership - One Nation',
               'meta_description' => 'Meet the dedicated leaders of One Nation Party working towards a better Britain.'
          ];

          $leaders = [
               [
                    'name' => 'Jaginder Singh Nichal',
                    'position' => 'Founder',
                    'image' => 'assets/images/js_nichal.jpeg',
                    'bio' => 'Founder of One Nation Party, dedicated to building a stronger, more united Britain.'
               ]
               // Add more leaders as needed
          ];

          return view('front.leadership', compact('data', 'leaders'));
     }

     public function policies()
     {
          $data = [
               'title' => 'Our Policies - One Nation',
               'meta_description' => 'Learn about One Nation Party\'s policies for a better, fairer, and stronger Britain.'
          ];

          $policies = [
               'Justice & Representation' => [
                    [
                         'title' => 'Fair Representation',
                         'description' => 'Ensuring every member has a voice in addressing public concerns.',
                         'key_points' => [
                              'Equal representation in government',
                              'Community engagement initiatives',
                              'Transparent decision-making processes'
                         ]
                    ],
                    [
                         'title' => 'Legal Reform',
                         'description' => 'Creating a fair and efficient justice system.',
                         'key_points' => [
                              'Access to legal aid',
                              'Streamlined court processes',
                              'Protection of civil rights'
                         ]
                    ]
               ],
               'Public Education' => [
                    [
                         'title' => 'Social Awareness',
                         'description' => 'Spreading awareness on social justice, human rights, and sustainability.',
                         'key_points' => [
                              'Community education programs',
                              'Public awareness campaigns',
                              'Youth engagement initiatives'
                         ]
                    ]
               ],
               'Economic Growth' => [
                    [
                         'title' => 'Business Support',
                         'description' => 'Supporting British businesses and workers.',
                         'key_points' => [
                              'Small business incentives',
                              'Job creation programs',
                              'Fair taxation policies'
                         ]
                    ]
               ],
               'Welfare Reform' => [
                    [
                         'title' => 'Fair Benefits',
                         'description' => 'Ensuring benefits reach those in real need while preventing abuse.',
                         'key_points' => [
                              'Streamlined application process',
                              'Regular review system',
                              'Support for vulnerable groups'
                         ]
                    ]
               ]
          ];

          return view('front.policies', compact('data', 'policies'));
     }

     public function memberShipDetails()
     {
          return view('front.membership-details');
     }


     public function submitContact()
     {
          $validated = request()->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email:rfc,dns|max:255',
               // 'email' => 'required|email|max:255',
               'subject' => 'required|string|max:255',
               'message' => 'required|string'
          ]);


          // dd($validated);

          try {
               Mail::to($validated['email'])->queue(new ContactMail($validated['name']));
          } catch (\Exception $e) {
               CustomLog::error('Failed to send email', [
                    'error' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile(),
                    'trace' => $e->getTraceAsString()
               ]);
               return redirect()->back()->with('error', 'Failed to send email');
          }

          contact::create($validated);
          return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon.');
     }
}
