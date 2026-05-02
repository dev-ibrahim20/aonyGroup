<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadsExportTest extends TestCase
{
    /**
     * Test the leads export route is accessible.
     */
    public function test_leads_export_route_exists(): void
    {
        $response = $this->get('/admin/leads/export');

        // Should return 200 or 302 (redirect to login if not authenticated)
        $this->assertContains($response->getStatusCode(), [200, 302]);
    }
}
