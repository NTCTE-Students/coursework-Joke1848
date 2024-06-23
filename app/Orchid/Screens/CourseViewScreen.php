<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class CourseViewScreen extends Screen
{
    /** 
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'courses' => Course::all(),
        ];
    }

    /** 
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'CourseView';
    }

    /** 
     * The screens action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create')
            ->icon('pencil')
            ->route('platform.course.edit')
        ];
    }

    /** 
     * The screens layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('courses', [
                TD::make('name', ('Name'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Course $course){
                    return Link::make($course->name)
                        ->route('platform.course.edit', $course);
                  }),
                  TD::make('cost', ('Cost'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Course $course){
                    return Link::make($course->cost)
                        ->route('platform.course.edit', $course);
                  }),
                  TD::make('description', __('Description'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Course $course){
                    return Link::make($course->description)
                        ->route('platform.course.edit', $course);
                  }),
            ])
        ];
    }
}