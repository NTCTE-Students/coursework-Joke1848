<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Illuminate\Http\Request;


class CourseEditScreen extends Screen
{
    public $course;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Course $course): iterable
    {
        return [
        'course' => $course];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->course->exists ? 'Edit course' : 'Creating a new course';
    }

    /**
     * The screens action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create course')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->course->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->course->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->course->exists),
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
            Layout::rows([
                Input::make('course.name')
                    ->title('Name'),
                Input::make('course.cost')
                    ->title('Cost'),
                Input::make('course.description')
                    ->title('Description'),
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->course->fill($request->get('course'))->save();

        Alert::info('You have successfully created a course.');

        return redirect()->route('platform.courses');
    }

    public function remove()
    {
        $this->course->delete();

        Alert::info('You have successfully deleted the course.');

        return redirect()->route('platform.courses');
    }
}
